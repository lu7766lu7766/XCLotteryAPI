<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/26
 * Time: 上午 09:54
 */

namespace Modules\Advertisement\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Advertisement\Entities\AdvertisementType;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Util\LaravelLoggerUtil;

class TypeRepo
{
    /**
     * @return AdvertisementType[]|Collection
     */
    public function getEnable()
    {
        try {
            $result = AdvertisementType::where('status', NYEnumConstants::YES)->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $id
     * @return AdvertisementType|null
     */
    public function findEnable(int $id)
    {
        try {
            $result = AdvertisementType::where('status', NYEnumConstants::YES)->find($id);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
