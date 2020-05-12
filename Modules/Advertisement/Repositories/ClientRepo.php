<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/28
 * Time: 上午 10:02
 */

namespace Modules\Advertisement\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Advertisement\Entities\Advertisement;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Util\LaravelLoggerUtil;

class ClientRepo
{
    /**
     * @param int $typeId
     * @return Advertisement[]|Collection
     */
    public function getEnableList(int $typeId)
    {
        try {
            $result = Advertisement::whereHas('type', function (Builder $builder) use ($typeId) {
                $builder->whereKey($typeId)
                    ->where('status', NYEnumConstants::YES);
            })
                ->where('status', NYEnumConstants::YES)
                ->latest('id')
                ->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
