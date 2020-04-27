<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/15
 * Time: 下午 05:33
 */

namespace Modules\Lottery\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Lottery\Entities\Lottery;

class LotteryRepo
{
    /**
     * @param int|null $classifiedId
     * @param string|null $enable
     * @param string|null $name
     * @param int $page
     * @param int $perpage
     * @return Collection|Lottery[]
     */
    public function list(
        int $classifiedId = null,
        string $enable = null,
        string $name = null,
        int $page = 1,
        int $perpage = 20
    ) {
        try {
            $builder = Lottery::query();
            if (!is_null($classifiedId)) {
                $builder->whereHas('classified', function (Builder $builder) use ($classifiedId) {
                    $builder->where('enable', NYEnumConstants::YES)
                        ->whereKey($classifiedId);
                });
            }
            if (!is_null($enable)) {
                $builder->where('enable', $enable);
            }
            if (!is_null($name)) {
                $builder->where('name', 'like', "%{$name}%");
            }
            $result = $builder->orderByDesc('id')
                ->forPage($page, $perpage)
                ->get();
        } catch (\Exception $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int|null $classifiedId
     * @param string|null $enable
     * @param string|null $name
     * @return int
     */
    public function total(
        int $classifiedId = null,
        string $enable = null,
        string $name = null
    ) {
        try {
            $builder = Lottery::query();
            if (!is_null($classifiedId)) {
                $builder->whereHas('classified', function (Builder $builder) use ($classifiedId) {
                    $builder->where('enable', NYEnumConstants::YES)
                        ->whereKey($classifiedId);
                });
            }
            if (!is_null($enable)) {
                $builder->where('enable', $enable);
            }
            if (!is_null($name)) {
                $builder->where('name', 'like', "%{$name}%");
            }
            $result = $builder->count();
        } catch (\Exception $e) {
            $result = 0;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $id
     * @return Lottery|null
     */
    public function info(int $id)
    {
        try {
            $result = Lottery::find($id);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param Lottery $orm
     * @return bool
     */
    public function saveData(Lottery $orm)
    {
        try {
            $result = $orm->save();
        } catch (\Throwable $e) {
            $result = false;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param Lottery $orm
     * @return bool|null
     */
    public function del(Lottery $orm)
    {
        try {
            $result = $orm->delete();
        } catch (\Throwable $e) {
            $result = false;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
