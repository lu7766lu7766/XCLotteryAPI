<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/8
 * Time: 下午 04:18
 */

namespace Modules\Lottery\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Lottery\Entities\LotteryClassified;

class LotteryClassifiedRepo
{
    /**
     * @param string|null $name
     * @param string|null $enable
     * @return Collection|LotteryClassified[]
     */
    public function list(
        string $name = null,
        string $enable = null
    ) {
        try {
            $builder = LotteryClassified::query();
            if (!is_null($name)) {
                $builder->where('name', 'like', "%{$name}%");
            }
            if (!is_null($enable)) {
                $builder->where('enable', $enable);
            }
            $result = $builder->orderBy('sequence')->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string|null $name
     * @param string|null $enable
     * @return int
     */
    public function total(string $name = null, string $enable = null)
    {
        try {
            $builder = LotteryClassified::query();
            if (!is_null($name)) {
                $builder->where('name', 'like', "%{$name}%");
            }
            if (!is_null($enable)) {
                $builder->where('enable', $enable);
            }
            $result = $builder->count();
        } catch (\Throwable $e) {
            $result = 0;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $id
     * @return LotteryClassified|null
     */
    public function findById(int $id)
    {
        try {
            $result = LotteryClassified::find($id);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param LotteryClassified $orm
     * @return bool
     */
    public function saveData(LotteryClassified $orm)
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
     * @param LotteryClassified $orm
     * @return bool
     */
    public function del(LotteryClassified $orm)
    {
        try {
            $result = $orm->delete();
        } catch (\Throwable $e) {
            $result = false;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @return Collection|LotteryClassified[]
     */
    public function getAllEnable()
    {
        try {
            $result = LotteryClassified::where('enable', NYEnumConstants::YES)->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
