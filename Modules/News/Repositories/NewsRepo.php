<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/30
 * Time: 下午 06:22
 */

namespace Modules\News\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Lottery\Entities\LotteryClassified;
use Modules\News\Entities\News;
use Modules\News\Entities\NewsClassified;

class NewsRepo
{
    /**
     * @param string|null $title
     * @param string|null $start
     * @param string|null $end
     * @param int|null $classifiedId
     * @param string|null $enable
     * @param int $page
     * @param int $perpage
     * @return Collection|News[]
     */
    public function list(
        string $title = null,
        string $start = null,
        string $end = null,
        int $classifiedId = null,
        string $enable = null,
        int $page = 1,
        int $perpage = 20
    ) {
        try {
            $builder = News::whereHas('classified', function (Builder $builder) use ($classifiedId) {
                if (!is_null($classifiedId)) {
                    $builder->whereKey($classifiedId);
                }
            });
            if (!is_null($title)) {
                $builder->where('title', 'like', "%{$title}%");
            }
            if (!is_null($start) && !is_null($end)) {
                $builder->whereBetween('post_time', [$start, $end]);
            }
            if (!is_null($enable)) {
                $builder->where('enable', $enable);
            }
            $result = $builder->orderByDesc('post_time')
                ->forPage($page, $perpage)
                ->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string|null $title
     * @param string|null $start
     * @param string|null $end
     * @param int|null $classifiedId
     * @param string|null $enable
     * @return int
     */
    public function total(
        string $title = null,
        string $start = null,
        string $end = null,
        int $classifiedId = null,
        string $enable = null
    ) {
        try {
            $builder = News::whereHas('classified', function (Builder $builder) use ($classifiedId) {
                if (!is_null($classifiedId)) {
                    $builder->whereKey($classifiedId);
                }
            });
            if (!is_null($title)) {
                $builder->where('title', 'like', "%{$title}%");
            }
            if (!is_null($start) && !is_null($end)) {
                $builder->whereBetween('post_time', [$start, $end]);
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
     * @return null|News
     */
    public function findById(int $id)
    {
        try {
            /** @var null|News $result */
            $result = News::find($id);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param array $params
     * @return bool
     */
    public function add(array $params)
    {
        try {
            $result = News::insert($params);
        } catch (\Throwable $e) {
            $result = false;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $classifiedId
     * @return News|null
     */
    public function getLatestNewsByWebPageIdWithTrashed(int $classifiedId)
    {
        try {
            $result = News::withTrashed()
                ->where('classified_id', $classifiedId)
                ->orderByDesc('post_time')
                ->first();
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param News $news
     * @param string $enable
     * @return bool
     */
    public function updateEnable(News $news, string $enable)
    {
        try {
            $result = $news->update(['enable' => $enable]);
        } catch (\Throwable $e) {
            $result = false;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param News $news
     * @return bool
     */
    public function del(News $news)
    {
        try {
            $del = $news->delete();
            /** @var bool $result */
            $result = is_null($del) ? false : $del;
        } catch (\Throwable $e) {
            $result = false;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $classifiedId
     * @param int $page
     * @param int $perpage
     * @return LotteryClassified|null
     */
    public function listByClassifiedId(int $classifiedId, int $page = 1, int $perpage = 20)
    {
        try {
            $result = NewsClassified::whereKey($classifiedId)->where('enable', NYEnumConstants::YES)
                ->with([
                    'news' => function (HasMany $builder) use ($page, $perpage) {
                        $builder->where('news.enable', NYEnumConstants::YES)
                            ->orderByDesc('news.post_time')
                            ->forPage($page, $perpage);
                    }
                ])
                ->whereHas('news', function (Builder $builder) {
                    $builder->where('news.enable', NYEnumConstants::YES);
                })
                ->first();
        } catch (\Exception $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $classifiedId
     * @return int
     */
    public function listByClassifiedIdTotal(int $classifiedId)
    {
        try {
            $result = News::where('enable', NYEnumConstants::YES)
                ->whereHas('classified', function (Builder $builder) use ($classifiedId) {
                    $builder->whereKey($classifiedId)
                        ->where('news_classified.enable', NYEnumConstants::YES);
                })
                ->count();
        } catch (\Exception $e) {
            $result = 0;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $id
     * @return News|null
     */
    public function findEnableById(int $id)
    {
        try {
            $result = News::whereKey($id)
                ->where('enable', NYEnumConstants::YES)
                ->whereHas('classified', function (Builder $builder) {
                    $builder->where('enable', NYEnumConstants::YES);
                })
                ->first();
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $limit
     * @return News[]|Collection
     */
    public function latest(int $limit)
    {
        try {
            $result = News::where('enable', NYEnumConstants::YES)
                ->orderByDesc('post_time')
                ->take($limit)
                ->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
