<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/20
 * Time: 上午 10:42
 */

namespace Modules\Lottery\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Lottery\Entities\LotteryResult;

class LotteryResultRepo
{
    /**
     * @param string|null $start
     * @param string|null $end
     * @param string|null $classifiedId
     * @param string|null $lotteryId
     * @param string|null $enable
     * @param string|null $period
     * @param int $page
     * @param int $perpage
     * @return Collection|LotteryResult[]
     */
    public function list(
        string $start = null,
        string $end = null,
        string $classifiedId = null,
        string $lotteryId = null,
        string $enable = null,
        string $period = null,
        int $page = 1,
        int $perpage = 20
    ) {
        try {
            $builder = LotteryResult::query();
            if (!is_null($enable)) {
                $builder->where('enable', $enable);
            }
            if (!is_null($start) && !is_null($end)) {
                $builder->whereBetween('draw_time', [$start, $end]);
            }
            if (!is_null($period)) {
                $builder->where('period', 'like', "%{$period}%");
            }
            $result = $builder->whereHas('game', function (Builder $builder) use ($classifiedId, $lotteryId) {
                $builder->where('enable', NYEnumConstants::YES)
                    ->whereHas('classified', function (Builder $builder) use ($classifiedId) {
                        $builder->where('enable', NYEnumConstants::YES);
                        if (!is_null($classifiedId)) {
                            $builder->whereKey($classifiedId);
                        }
                    });
                if (!is_null($lotteryId)) {
                    $builder->whereKey($lotteryId);
                }
            })
                ->whereNotNull('winning_numbers')
                ->orderByDesc('draw_time')
                ->forPage($page, $perpage)
                ->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string|null $start
     * @param string|null $end
     * @param string|null $classifiedId
     * @param string|null $lotteryId
     * @param string|null $enable
     * @param string|null $period
     * @return int
     */
    public function total(
        string $start = null,
        string $end = null,
        string $classifiedId = null,
        string $lotteryId = null,
        string $enable = null,
        string $period = null
    ) {
        try {
            $builder = LotteryResult::query();
            if (!is_null($enable)) {
                $builder->where('enable', $enable);
            }
            if (!is_null($start) && !is_null($end)) {
                $builder->whereBetween('draw_time', [$start, $end]);
            }
            if (!is_null($period)) {
                $builder->where('period', 'like', "%{$period}%");
            }
            $result = $builder->whereHas('game', function (Builder $builder) use ($classifiedId, $lotteryId) {
                $builder->where('enable', NYEnumConstants::YES)
                    ->whereHas('classified', function (Builder $builder) use ($classifiedId) {
                        $builder->where('enable', NYEnumConstants::YES);
                        if (!is_null($classifiedId)) {
                            $builder->whereKey($classifiedId);
                        }
                    });
                if (!is_null($lotteryId)) {
                    $builder->whereKey($lotteryId);
                }
            })
                ->whereNotNull('winning_numbers')
                ->count();
        } catch (\Throwable $e) {
            $result = 0;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $id
     * @return LotteryResult|null
     */
    public function findById(int $id)
    {
        try {
            /** @var LotteryResult|null $result */
            $result = LotteryResult::whereHas('game', function (Builder $builder) {
                $builder->where('enable', NYEnumConstants::YES)
                    ->whereHas('classified', function (Builder $builder) {
                        $builder->where('enable', NYEnumConstants::YES);
                    });
            })
                ->find($id);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param LotteryResult $orm
     * @return bool
     */
    public function saveData(LotteryResult $orm)
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
     * @param LotteryResult $orm
     * @return bool
     */
    public function del(LotteryResult $orm)
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
     * @param array $attributes
     * @return bool
     */
    public function insert(array $attributes)
    {
        try {
            $result = LotteryResult::insert($attributes);
        } catch (\Throwable $e) {
            $result = false;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string $code
     * @param string $start
     * @param string $end
     * @return LotteryResult[]|Collection
     */
    public function findUnDrawByDateTime(string $code, string $start, string $end)
    {
        try {
            $result = LotteryResult::query()->whereBetween('draw_time', [$start, $end])
                ->whereHas('game', function (Builder $builder) use ($code) {
                    $builder->where('code', $code);
                })
                ->whereNull('winning_numbers')
                ->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
