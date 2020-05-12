<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/28
 * Time: 上午 09:56
 */

namespace Modules\Advertisement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Advertisement\Entities\Advertisement;
use Modules\Advertisement\Entities\AdvertisementType;
use Modules\Advertisement\Http\Requests\ClientListRequestHandle;
use Modules\Advertisement\Services\ClientService;

class ClientAdvertisementController extends Controller
{
    /**
     * @param ClientListRequestHandle $request
     * @return Collection|Advertisement[]
     */
    public function list(ClientListRequestHandle $request)
    {
        return app(ClientService::class)->list($request);
    }

    /**
     * @return Collection|AdvertisementType[]
     */
    public function typeList()
    {
        return app(ClientService::class)->typeList();
    }
}
