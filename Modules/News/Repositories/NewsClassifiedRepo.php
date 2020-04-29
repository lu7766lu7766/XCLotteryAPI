<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 04:24
 */

namespace Modules\News\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\News\Entities\NewsClassified;

class NewsClassifiedRepo
{
    /**
     * @param string|null $name
     * @param string|null $enable
     * @return NewsClassified[]|Collection
     */
    public function list(string $name = null, string $enable = null)
    {
        try {
            $builder = is_null($name) ? NewsClassified::query() : NewsClassified::where('name', 'like', "%{$name}%");
            if (!is_null($enable)) {
                $builder->where('enable', $enable);
            }
            $result = $builder->get();
        } catch (\Exception $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $id
     * @return NewsClassified|null
     */
    public function findById(int $id)
    {
        try {
            $result = NewsClassified::find($id);
        } catch (\Exception $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param NewsClassified $newsClassified
     * @param array $attributes
     * @return bool
     */
    public function update(NewsClassified $newsClassified, array $attributes)
    {
        try {
            $result = $newsClassified->update($attributes);
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
    public function create(array $attributes)
    {
        try {
            $result = NewsClassified::insert($attributes);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
