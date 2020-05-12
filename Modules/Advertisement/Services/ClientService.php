<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/28
 * Time: 上午 10:00
 */

namespace Modules\Advertisement\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Advertisement\Entities\Advertisement;
use Modules\Advertisement\Entities\AdvertisementType;
use Modules\Advertisement\Http\Requests\ClientListRequestHandle;
use Modules\Advertisement\Repositories\ClientRepo;
use Modules\Advertisement\Repositories\TypeRepo;

class ClientService
{
    /**
     * @param ClientListRequestHandle $request
     * @return Collection|Advertisement[]
     */
    public function list(ClientListRequestHandle $request)
    {
        return app(ClientRepo::class)->getEnableList($request->getTypeId())->load('type');
    }

    /**
     * @return Collection|AdvertisementType[]
     */
    public function typeList()
    {
        return app(TypeRepo::class)->getEnable();
    }
}
