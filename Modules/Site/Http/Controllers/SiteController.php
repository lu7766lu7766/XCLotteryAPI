<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/25
 * Time: 下午 02:16
 */

namespace Modules\Site\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use XC\Independent\Kit\Support\Scalar\StringMaster;

class SiteController extends Controller
{
    /**
     * @return string
     */
    public function resourceUrl()
    {
        $resourceUrl = config('Site.config.resource_url');
        if (StringMaster::isNotEmpty($resourceUrl)) {
            $resourceUrl = Str::endsWith($resourceUrl, '/') ? $resourceUrl : $resourceUrl . '/';
        }

        return $resourceUrl;
    }
}
