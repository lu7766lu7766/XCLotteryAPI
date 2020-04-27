<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/1
 * Time: 下午 04:45
 */

namespace Modules\Cooperation\Service;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Cooperation\Entities\Cooperation;
use Modules\Cooperation\Http\Requests\Manage\CooperationCreateRequest;
use Modules\Cooperation\Http\Requests\Manage\CooperationListRequest;
use Modules\Cooperation\Http\Requests\Manage\CooperationUpdateRequest;
use Modules\Cooperation\Repositories\CooperationRepo;

class ManageCooperationService
{
    /**
     * @var Cooperation|null
     */
    private $repo;

    /**
     * ManageCooperationService constructor.
     */
    public function __construct()
    {
        $this->repo = new CooperationRepo();
    }

    /**
     * @param CooperationListRequest $request
     * @return Collection|Cooperation[]
     */
    public function list(CooperationListRequest $request)
    {
        return $this->repo->list(
            $request->getTitle(),
            $request->getEnable(),
            $request->getPage(),
            $request->getPerpage()
        );
    }

    /**
     * @param CooperationListRequest $request
     * @return int
     */
    public function total(CooperationListRequest $request)
    {
        return $this->repo->total($request->getTitle(), $request->getEnable());
    }

    /**
     * @param int $id
     * @return Cooperation
     * @throws ApiErrorCodeException
     */
    public function info(int $id)
    {
        $orm = $this->repo->findById($id);
        if (is_null($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND);
        }

        return $orm;
    }

    /**
     * @param CooperationCreateRequest $request
     * @param Cloud $cloud
     * @return Cooperation
     * @throws ApiErrorCodeException
     */
    public function create(CooperationCreateRequest $request, Cloud $cloud)
    {
        $orm = new Cooperation();
        $orm->fill([
            'title'    => $request->getTitle(),
            'is_blank' => $request->getIsBlank(),
            'link'     => $request->getLink(),
            'enable'   => $request->getEnable()
        ]);
        if (!is_null($request->getImage())) {
            $orm->image_path = $this->uploadImage($request->getImage(), $cloud);
        }
        $result = $this->repo->saveData($orm);
        if (!$result) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::CREATE_FAIL);
        }

        return $orm;
    }

    /**
     * @param CooperationUpdateRequest $request
     * @param Cloud $cloud
     * @return Cooperation|null
     * @throws ApiErrorCodeException
     */
    public function update(CooperationUpdateRequest $request, Cloud $cloud)
    {
        $orm = $this->info($request->getId());
        $orm->fill([
            'title'    => $request->getTitle(),
            'is_blank' => $request->getIsBlank(),
            'link'     => $request->getLink(),
            'enable'   => $request->getEnable()
        ]);
        if (!is_null($request->getDelImage())) {
            $cloud->delete($orm->image_path);
            $orm->image_path = null;
        }
        if (!is_null($request->getImage())) {
            $cloud->delete($orm->image_path);
            $orm->image_path = $this->uploadImage($request->getImage(), $cloud);
        }
        if (!$this->repo->saveData($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $orm;
    }

    /**
     * @param int $id
     * @return Cooperation
     * @throws ApiErrorCodeException
     */
    public function del(int $id)
    {
        $orm = $this->info($id);
        if (!$this->repo->del($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $orm;
    }

    /**
     * @param UploadedFile|null $image
     * @param Cloud $cloud
     * @return string
     * @throws ApiErrorCodeException
     */
    private function uploadImage($image, $cloud)
    {
        $fullPath = $cloud->put(config('Cooperation.config.image_path'), $image, Filesystem::VISIBILITY_PUBLIC);
        if (is_bool($fullPath)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::CREATE_FAIL, 'Upload image fail');
        }

        return $fullPath;
    }
}
