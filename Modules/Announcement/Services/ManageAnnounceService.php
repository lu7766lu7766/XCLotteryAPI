<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/30
 * Time: 下午 04:57
 */

namespace Modules\Announcement\Services;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Modules\Announcement\Entities\Announcement;
use Modules\Announcement\Http\Requests\GetIdRequestHandle;
use Modules\Announcement\Http\Requests\ListRequestHandle;
use Modules\Announcement\Http\Requests\StoreRequestHandle;
use Modules\Announcement\Http\Requests\UpdateRequestHandle;
use Modules\Announcement\Repositories\ManageAnnounceRepo;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Files\Contracts\IEditorFilesProvider;

class ManageAnnounceService
{
    /** @var ManageAnnounceRepo $repo */
    private $repo;
    /** @var IEditorFilesProvider $editorFilesProvider */
    private $editorFilesProvider;

    /**
     * ManageAnnounceService constructor.
     * @param IEditorFilesProvider $editorFilesProvider
     */
    public function __construct(IEditorFilesProvider $editorFilesProvider)
    {
        $this->repo = new ManageAnnounceRepo();
        $this->editorFilesProvider = $editorFilesProvider;
    }

    /**
     * @param ListRequestHandle $request
     * @return \Illuminate\Database\Eloquent\Collection|Announcement[]
     */
    public function list(ListRequestHandle $request)
    {
        return $this->repo->get(
            $request->getTitle(),
            $request->getIsMarquee(),
            $request->getIsTop(),
            $request->getStatus(),
            $request->getPage(),
            $request->getPerpage()
        )->load('editorFiles');
    }

    /**
     * @param ListRequestHandle $request
     * @return int
     */
    public function total(ListRequestHandle $request)
    {
        return $this->repo->count(
            $request->getTitle(),
            $request->getIsMarquee(),
            $request->getIsTop(),
            $request->getStatus()
        );
    }

    /**
     * @param StoreRequestHandle $request
     * @param Cloud $cloud
     * @return Announcement
     * @throws ApiErrorCodeException
     * @throws \Throwable
     */
    public function create(StoreRequestHandle $request, Cloud $cloud)
    {
        $attributes = [
            'title'      => $request->getTitle(),
            'contents'   => $request->getContents(),
            'is_marquee' => $request->getIsMarquee(),
            'is_top'     => $request->getIsTop(),
            'status'     => $request->getStatus(),
        ];
        $editorFiles = $this->editorFilesProvider->getByIds($request->getEditorImageIds());
        if (!is_null($request->getCover())) {
            $cover = $this->uploadImage($request->getCover(), $cloud);
            $attributes['cover'] = $cover;
        }
        /** @var Announcement $announcement */
        \DB::transaction(function () use ($attributes, $editorFiles, &$announcement) {
            if (is_null($announcement = Announcement::create($attributes))) {
                throw new ApiErrorCodeException(OOOO1CommonCodes::CREATE_FAIL, 'create fail');
            }
            $announcement->usedEditorFile($editorFiles);
        });

        return $announcement->load('editorFiles');
    }

    /**
     * @param GetIdRequestHandle $request
     * @return Announcement
     * @throws ApiErrorCodeException
     */
    public function edit(GetIdRequestHandle $request)
    {
        return $this->info($request->getId())->load('editorFiles');
    }

    /**
     * @param UpdateRequestHandle $request
     * @param Cloud $cloud
     * @return Announcement
     * @throws ApiErrorCodeException
     * @throws \Throwable
     */
    public function update(UpdateRequestHandle $request, Cloud $cloud)
    {
        $announcement = $this->info($request->getId());
        $announcement->fill([
            'title'      => $request->getTitle(),
            'contents'   => $request->getContents(),
            'is_marquee' => $request->getIsMarquee(),
            'is_top'     => $request->getIsTop(),
            'status'     => $request->getStatus(),
        ]);
        $editorFiles = $this->editorFilesProvider->getByIds($request->getEditorImageIds());
        if ($request->getRemoveCover()) {
            $cloud->delete($announcement->cover);
            $announcement->cover = null;
        }
        if (!is_null($request->getCover())) {
            $cloud->delete($announcement->cover);
            $cover = $this->uploadImage($request->getCover(), $cloud);
            $announcement->cover = $cover;
        }
        \DB::transaction(function () use ($editorFiles, $announcement) {
            if (!$announcement->save()) {
                throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL, 'update fail');
            }
            $announcement->usedEditorFile($editorFiles);
        });

        return $announcement->load('editorFiles');
    }

    /**
     * @param GetIdRequestHandle $request
     * @param Cloud $cloud
     * @return Announcement
     * @throws ApiErrorCodeException
     * @throws \Throwable
     */
    public function delete(GetIdRequestHandle $request, Cloud $cloud)
    {
        $announcement = $this->info($request->getId());
        \DB::transaction(function () use (&$announcement, $cloud) {
            if ($announcement->delete()) {
                $editorFilesIds = $announcement->editorFiles()->pluck('editor_files.id')->toArray();
                $announcement->cancelEditorFile();
                $unusedEditorFiles = $this->editorFilesProvider->getUnusedByIds($editorFilesIds);
                $this->editorFilesProvider->deleteByIds($unusedEditorFiles->pluck('id')->toArray());
                $cloud->delete(array_merge($unusedEditorFiles->pluck('file_path')->toArray(), [$announcement->cover]));
            }
        });

        return $announcement;
    }

    /**
     * @param UploadedFile $image
     * @param Cloud $cloud
     * @return string
     * @throws ApiErrorCodeException
     */
    private function uploadImage(UploadedFile $image, Cloud $cloud)
    {
        $path = config('Announcement.config.file_path');
        $result = $cloud->put($path, $image, Filesystem::VISIBILITY_PUBLIC);
        if (!$result) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::ERROR, 'upload fail');
        }

        return $result;
    }

    /**
     * @param int $id
     * @return Announcement
     * @throws ApiErrorCodeException
     */
    private function info(int $id)
    {
        $result = $this->repo->find($id);
        if (is_null($result)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND, 'model not found');
        }

        return $result;
    }
}
