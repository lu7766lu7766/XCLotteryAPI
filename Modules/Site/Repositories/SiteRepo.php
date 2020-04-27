<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/25
 * Time: 上午 10:38
 */

namespace Modules\Site\Repositories;

use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Site\Entities\Site;

class SiteRepo
{
    /**
     * @return Site|null
     */
    public function first()
    {
        try {
            $result = Site::first();
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param Site $site
     * @return bool
     */
    public function save(Site $site)
    {
        try {
            $result = $site->save();
        } catch (\Throwable $e) {
            $result = false;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
