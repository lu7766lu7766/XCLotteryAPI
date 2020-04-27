<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/6
 * Time: 下午 05:12
 */

namespace Modules\Copywriting\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Copywriting\Entities\Copywriting;

class CopywritingRepo
{
    /**
     * @param string|null $title
     * @param string|null $enable
     * @param int $page
     * @param int $perpage
     * @return Collection|Copywriting[]
     */
    public function list(
        string $title = null,
        string $enable = null,
        int $page = 1,
        int $perpage = 20
    ) {
        try {
            $builder = is_null($title) ? Copywriting::query() : Copywriting::where('title', 'like', "%{$title}%");
            if (!is_null($enable)) {
                $builder->where('enable', $enable);
            }
            $result = $builder->orderByDesc('id')->forPage($page, $perpage)->get();
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
            $builder = is_null($title) ? Copywriting::query() : Copywriting::where('title', 'like', "%{$title}%");
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
     * @return Copywriting|null
     */
    public function findById(int $id)
    {
        try {
            $result = Copywriting::find($id);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param Copywriting $orm
     * @return bool
     */
    public function saveData(Copywriting $orm)
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
     * @param Copywriting $orm
     * @return bool
     */
    public function del(Copywriting $orm)
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
