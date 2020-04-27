<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/1
 * Time: 下午 04:11
 */

namespace Modules\Cooperation\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Cooperation\Entities\Cooperation;

class CooperationRepo
{
    /**
     * @param string|null $title
     * @param string|null $enable
     * @param int $page
     * @param int $perpage
     * @return Collection|Cooperation[]
     */
    public function list(
        string $title = null,
        string $enable = null,
        int $page = 1,
        int $perpage = 20
    ) {
        try {
            $builder = is_null($title) ? Cooperation::query() : Cooperation::where('title', 'like', "%{$title}%");
            if (!is_null($enable)) {
                $builder->where('enable', $enable);
            }
            $result = $builder->forPage($page, $perpage)
                ->orderByDesc('id')
                ->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string|null $title
     * @param string|null $enable
     * @return int
     */
    public function total(string $title = null, string $enable = null)
    {
        try {
            $builder = is_null($title) ? Cooperation::query() : Cooperation::where('title', 'like', "%{$title}%");
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
     * @return Cooperation|null
     */
    public function findById(int $id)
    {
        try {
            $result = Cooperation::find($id);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param Cooperation $orm
     * @return bool
     */
    public function saveData(Cooperation $orm)
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
     * @param Cooperation $orm
     * @return bool
     */
    public function del(Cooperation $orm)
    {
        try {
            $result = is_null($isSuccess = $orm->delete()) ? false : $isSuccess;
        } catch (\Throwable $e) {
            $result = false;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
