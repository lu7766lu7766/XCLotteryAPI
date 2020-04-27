<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/30
 * Time: 下午 05:34
 */

namespace Modules\Announcement\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Announcement\Entities\Announcement;
use Modules\Base\Util\LaravelLoggerUtil;

class ManageAnnounceRepo
{
    /**
     * @param string|null $title
     * @param string|null $isMarquee
     * @param string|null $isTop
     * @param string|null $status
     * @param int $page
     * @param int $perpage
     * @return Announcement[]|Collection
     */
    public function get(
        string $title = null,
        string $isMarquee = null,
        string $isTop = null,
        string $status = null,
        int $page = 1,
        int $perpage = 20
    ) {
        try {
            $query = Announcement::query();
            if (!is_null($title)) {
                $query->where('title', 'like', '%' . $title . '%');
            }
            if (!is_null($isMarquee)) {
                $query->where('is_marquee', $isMarquee);
            }
            if (!is_null($isTop)) {
                $query->where('is_top', $isTop);
            }
            if (!is_null($status)) {
                $query->where('status', $status);
            }
            $result = $query->latest('id')->forPage($page, $perpage)->get();
        } catch (\Throwable $e) {
            $result = Collection::make();
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string|null $title
     * @param string|null $isMarquee
     * @param string|null $isTop
     * @param string|null $status
     * @return int
     */
    public function count(
        string $title = null,
        string $isMarquee = null,
        string $isTop = null,
        string $status = null
    ) {
        try {
            $query = Announcement::query();
            if (!is_null($title)) {
                $query->where('title', 'like', '%' . $title . '%');
            }
            if (!is_null($isMarquee)) {
                $query->where('is_marquee', $isMarquee);
            }
            if (!is_null($isTop)) {
                $query->where('is_top', $isTop);
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
     * @return Announcement|null
     */
    public function find(int $id)
    {
        try {
            $result = Announcement::find($id);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
