<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/27
 * Time: 下午 04:53
 */

namespace Modules\Site\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Site\Entities\Site;
use Modules\Site\Service\SiteService;

class ClientSiteController extends Controller
{
    /**
     * @return Site|null
     */
    public function settings()
    {
        return app(SiteService::class)->first();
    }
}
