<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/26
 * Time: 上午 10:54
 */

namespace Modules\Advertisement\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Advertisement\Entities\Advertisement;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Util\LaravelLoggerUtil;

class ManageRepo
{
    /**
     * @param int|null $typeId
     * @param string|null $title
     * @param string|null $status
     * @param int $page
     * @param int $perpage
     * @return Advertisement[]|Collection
     */
    public function get(
        int $typeId = null,
        string $title = null,
        string $status = null,
        int $page = 1,
        int $perpage = 20
    ) {
        try {
            $query = Advertisement::whereHas('type', function (Builder $builder) use ($typeId) {
                $builder->where('status', NYEnumConstants::YES);
                if (!is_null($typeId)) {
                    $builder->whereKey($typeId);
                }
            });
            if (!is_null($title)) {
                $query->where('title', 'LIKE', "%{$title}%");
            }
            if (!is_null($status)) {
                $query->where('status', $status);
            }
            $result = $query->latest('id')
                ->forPage($page, $perpage)
                ->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int|null $typeId
     * @param string|null $title
     * @param string|null $status
     * @return int
     */
    public function count(
        int $typeId = null,
        string $title = null,
        string $status = null
    ) {
        try {
            $query = Advertisement::whereHas('type', function (Builder $builder) use ($typeId) {
                $builder->where('status', NYEnumConstants::YES);
                if (!is_null($typeId)) {
                    $builder->whereKey($typeId);
                }
            });
            if (!is_null($title)) {
                $query->where('title', 'LIKE', "%{$title}%");
            }
            if (!is_null($status)) {
                $query->where('status', $status);
            }
            $result = $query->count();
        } catch (\Throwable $e) {
            $result = 0;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $id
     * @return Advertisement|null
     */
    public function find(int $id)
    {
        try {
            $result = Advertisement::find($id);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
