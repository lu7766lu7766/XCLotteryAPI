<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/24
 * Time: 下午 06:07
 */

namespace Modules\Site\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Cloud;
use Modules\Site\Entities\Site;
use Modules\Site\Http\Requests\ManageSiteUpdateRequest;
use Modules\Site\Service\ManageSiteService;

class ManageSiteController extends Controller
{
    /**
     * @return Site|null
     */
    public function index()
    {
        return app(ManageSiteService::class)->first();
    }

    /**
     * @param ManageSiteUpdateRequest $request
     * @return Site|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function update(ManageSiteUpdateRequest $request)
    {
        return app(ManageSiteService::class)->update($request, app(Cloud::class));
    }
}
