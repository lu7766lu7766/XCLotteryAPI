<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/25
 * Time: 下午 08:10
 */

namespace Modules\Advertisement\Services;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Modules\Advertisement\Entities\Advertisement;
use Modules\Advertisement\Http\Requests\GetIdRequestHandle;
use Modules\Advertisement\Http\Requests\ListRequestHandle;
use Modules\Advertisement\Http\Requests\StoreRequestHandle;
use Modules\Advertisement\Http\Requests\UpdateRequestHandle;
use Modules\Advertisement\Repositories\ManageRepo;
use Modules\Advertisement\Repositories\TypeRepo;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Exception\ApiErrorCodeException;

class ManageService
{
    /** @var ManageRepo $repo */
    private $repo;

    /**
     * ManageService constructor.
     */
    public function __construct()
    {
        $this->repo = new ManageRepo();
    }

    /**
     * @param ListRequestHandle $request
     * @return \Illuminate\Database\Eloquent\Collection|Advertisement[]
     */
    public function list(ListRequestHandle $request)
    {
        return $this->repo->get(
            $request->getTypeId(),
            $request->getTitle(),
            $request->getStatus(),
            $request->getPage(),
            $request->getPerpage()
        )->load('type');
    }

    /**
     * @param ListRequestHandle $request
     * @return int
     */
    public function total(ListRequestHandle $request)
    {
        return $this->repo->count(
            $request->getTypeId(),
            $request->getTitle(),
            $request->getStatus()
        );
    }

    /**
     * @param StoreRequestHandle $request
     * @param Cloud $cloud
     * @return Advertisement
     * @throws ApiErrorCodeException
     */
    public function add(StoreRequestHandle $request, Cloud $cloud)
    {
        $image = $this->uploadImage($request->getImage(), $cloud);
        $type = $this->findEnableType($request->getTypeId());
        $attributes = [
            'title'      => $request->getTitle(),
            'image_path' => $image,
            'is_blank'   => $request->isBlank(),
            'url'        => $request->getUrl(),
            'status'     => $request->getStatus(),
        ];
        $advertisement = new Advertisement($attributes);
        if (!$advertisement->type()->associate($type)->save()) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::CREATE_FAIL, 'create fail');
        }

        return $advertisement;
    }

    /**
     * @param GetIdRequestHandle $request
     * @return Advertisement|null
     * @throws ApiErrorCodeException
     */
    public function info(GetIdRequestHandle $request)
    {
        return $this->find($request->getId())->load('type');
    }

    /**
     * @param UpdateRequestHandle $request
     * @param Cloud $cloud
     * @return Advertisement|null
     * @throws ApiErrorCodeException
     */
    public function update(UpdateRequestHandle $request, Cloud $cloud)
    {
        $type = $this->findEnableType($request->getTypeId());
        $advertisement = $this->find($request->getId());
        $advertisement->fill([
            'title'    => $request->getTitle(),
            'is_blank' => $request->isBlank(),
            'url'      => $request->getUrl(),
            'status'   => $request->getStatus(),
        ]);
        if (!is_null($request->getImage())) {
            $image = $this->uploadImage($request->getImage(), $cloud);
            $cloud->delete($advertisement->image_path);
            $advertisement->image_path = $image;
        }
        if (!$advertisement->type()->associate($type)->save()) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL, 'update fail');
        }

        return $advertisement;
    }

    /**
     * @param GetIdRequestHandle $request
     * @param Cloud $cloud
     * @return Advertisement|null
     * @throws ApiErrorCodeException
     */
    public function delete(GetIdRequestHandle $request, Cloud $cloud)
    {
        $advertisement = $this->find($request->getId());
        $cloud->delete($advertisement->image_path);

        return $advertisement->delete() ? $advertisement : null;
    }

    /**
     * @param UploadedFile $image
     * @param Cloud $cloud
     * @return string
     * @throws ApiErrorCodeException
     */
    private function uploadImage(UploadedFile $image, Cloud $cloud)
    {
        $path = config('Advertisement.config.file_path');
        $result = $cloud->put($path, $image, Filesystem::VISIBILITY_PUBLIC);
        if (!$result) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::ERROR, 'upload fail');
        }

        return $result;
    }

    /**
     * @param int $id
     * @return \Modules\Advertisement\Entities\AdvertisementType|null
     * @throws ApiErrorCodeException
     */
    private function findEnableType(int $id)
    {
        $type = app(TypeRepo::class)->findEnable($id);
        if (is_null($type)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND, 'model not found');
        }

        return $type;
    }

    /**
     * @param int $id
     * @return Advertisement|null
     * @throws ApiErrorCodeException
     */
    private function find(int $id)
    {
        $result = $this->repo->find($id);
        if (is_null($result)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND, 'model not found');
        }

        return $result;
    }
}
