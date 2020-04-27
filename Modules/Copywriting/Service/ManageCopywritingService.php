<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/6
 * Time: 下午 05:22
 */

namespace Modules\Copywriting\Service;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Copywriting\Entities\Copywriting;
use Modules\Copywriting\Http\Requests\Manage\CopywritingCreateRequest;
use Modules\Copywriting\Http\Requests\Manage\CopywritingListRequest;
use Modules\Copywriting\Http\Requests\Manage\CopywritingUpdateRequest;
use Modules\Copywriting\Repositories\CopywritingRepo;
use Modules\Files\Contracts\IEditorFilesProvider;
use XC\Independent\Kit\Support\Scalar\StringMaster;

class ManageCopywritingService
{
    /** @var CopywritingRepo $repo */
    private $repo;
    /** @var IEditorFilesProvider $editorFilesProvider */
    private $editorFilesProvider;

    /**
     * ManageCopywritingService constructor.
     * @param IEditorFilesProvider $editorFilesProvider
     */
    public function __construct(IEditorFilesProvider $editorFilesProvider)
    {
        $this->repo = new CopywritingRepo();
        $this->editorFilesProvider = $editorFilesProvider;
    }

    /**
     * @param CopywritingListRequest $request
     * @return Collection|Copywriting[]
     */
    public function list(CopywritingListRequest $request)
    {
        return $this->repo->list(
            $request->getTitle(),
            $request->getEnable(),
            $request->getPage(),
            $request->getPerpage()
        )
            ->load('editorFiles');
    }

    /**
     * @param CopywritingListRequest $request
     * @return int
     */
    public function total(CopywritingListRequest $request)
    {
        return $this->repo->total(
            $request->getTitle(),
            $request->getEnable()
        );
    }

    /**
     * @param int $id
     * @return Copywriting
     * @throws ApiErrorCodeException
     */
    public function info(int $id)
    {
        $orm = $this->repo->findById($id);
        if (is_null($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND);
        }

        return $orm->load('editorFiles');
    }

    /**
     * @param CopywritingCreateRequest $request
     * @return Copywriting
     * @throws \Throwable
     */
    public function create(CopywritingCreateRequest $request)
    {
        $orm = new Copywriting();
        $orm->fill([
            'title'   => $request->getTitle(),
            'code'    => StringMaster::upper($request->getCode()),
            'content' => $request->getDescription(),
            'enable'  => $request->getEnable()
        ]);
        \DB::transaction(function () use ($orm, $request) {
            $result = $this->repo->saveData($orm);
            if (!$result) {
                throw new ApiErrorCodeException(OOOO1CommonCodes::CREATE_FAIL);
            }
            $orm->usedEditorFile($request->getEditorImageIds());
        });

        return $orm->load('editorFiles');
    }

    /**
     * @param CopywritingUpdateRequest $request
     * @return Copywriting|null
     * @throws ApiErrorCodeException
     * @throws \Throwable
     */
    public function update(CopywritingUpdateRequest $request)
    {
        $orm = $this->info($request->getId());
        $orm->fill([
            'title'   => $request->getTitle(),
            'code'    => StringMaster::upper($request->getCode()),
            'content' => $request->getDescription(),
            'enable'  => $request->getEnable()
        ]);
        \DB::transaction(function () use ($orm, $request) {
            $result = $this->repo->saveData($orm);
            if (!$result) {
                throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
            }
            $orm->usedEditorFile($request->getEditorImageIds());
        });

        return $orm->load('editorFiles');
    }

    /**
     * @param int $id
     * @param Cloud $cloud
     * @return Copywriting|null
     * @throws ApiErrorCodeException
     * @throws \Throwable
     */
    public function del(int $id, Cloud $cloud)
    {
        $orm = $this->info($id);
        \DB::transaction(function () use ($orm, $cloud) {
            $result = $this->repo->del($orm);
            if (!$result) {
                throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
            }
            $editorFiles = $orm->editorFiles();
            $cloud->delete($editorFiles->pluck('file_path')->toArray());
            $editorFiles->delete();
        });

        return $orm;
    }
}
