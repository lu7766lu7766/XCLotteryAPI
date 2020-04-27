<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/16
 * Time: 上午 10:37
 */

namespace Modules\Lottery\Service;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\UploadedFile;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Lottery\Entities\Lottery;
use Modules\Lottery\Http\Requests\Manage\LotteryListRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryUpdateRequest;
use Modules\Lottery\Repositories\LotteryRepo;

class ManageLotteryService
{
    /** @var LotteryRepo */
    private $lotteryRepo;

    /**
     * ManageLotteryService constructor.
     */
    public function __construct()
    {
        $this->lotteryRepo = new LotteryRepo();
    }

    /**
     * @param LotteryListRequest $request
     * @return Collection|Lottery[]
     */
    public function list(LotteryListRequest $request)
    {
        return $this->lotteryRepo->list(
            $request->getClassifiedId(),
            $request->getEnable(),
            $request->getName(),
            $request->getPage(),
            $request->getPerpage()
        )->load([
            'classified' => function (BelongsToMany $builder) {
                $builder->where('enable', NYEnumConstants::YES);
            }
        ]);
    }

    /**
     * @param LotteryListRequest $request
     * @return int
     */
    public function total(LotteryListRequest $request)
    {
        return $this->lotteryRepo->total(
            $request->getClassifiedId(),
            $request->getEnable(),
            $request->getName()
        );
    }

    /**
     * @param int $id
     * @return Lottery
     * @throws ApiErrorCodeException
     */
    public function info(int $id)
    {
        $orm = $this->lotteryRepo->info($id);
        if (is_null($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND);
        }

        return $orm->load([
            'classified' => function (BelongsToMany $builder) {
                $builder->where('enable', NYEnumConstants::YES);
            }
        ]);
    }

    /**
     * @param LotteryUpdateRequest $request
     * @param Cloud $cloud
     * @return Lottery
     * @throws ApiErrorCodeException
     */
    public function update(LotteryUpdateRequest $request, Cloud $cloud)
    {
        $orm = $this->lotteryRepo->info($request->getId());
        if (is_null($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND);
        }
        $orm->fill([
            'name'   => $request->getName(),
            'enable' => $request->getEnable()
        ]);
        if (!is_null($request->getDelImage())) {
            $cloud->delete($orm->image_path);
            $orm->image_path = null;
        }
        if (!is_null($request->getImage())) {
            $cloud->delete($orm->image_path);
            $orm->image_path = $this->uploadImage($request->getImage(), $cloud);
        }
        try {
            \DB::transaction(function () use ($orm, $request) {
                $this->lotteryRepo->saveData($orm);
                $orm->classified()->sync($request->getClassifiedIds());
            });
        } catch (\Throwable $e) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $orm->load([
            'classified' => function (BelongsToMany $builder) {
                $builder->where('enable', NYEnumConstants::YES);
            }
        ]);
    }

    /**
     * @param int $id
     * @return Lottery
     * @throws ApiErrorCodeException
     */
    public function del(int $id)
    {
        $orm = $this->lotteryRepo->info($id);
        if (is_null($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND);
        }
        if (!$this->lotteryRepo->del($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $orm;
    }

    /**
     * @param UploadedFile $image
     * @param Cloud $cloud
     * @return string
     * @throws ApiErrorCodeException
     */
    private function uploadImage(UploadedFile $image, Cloud $cloud)
    {
        $fullPath = $cloud->put(config('Lottery.config.image_path'), $image, Filesystem::VISIBILITY_PUBLIC);
        if (is_bool($fullPath)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::CREATE_FAIL, 'Upload image fail');
        }

        return $fullPath;
    }
}
