<?php

namespace Modules\Advertisement\Http\Controllers;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Routing\Controller;
use Modules\Advertisement\Http\Requests\GetIdRequestHandle;
use Modules\Advertisement\Http\Requests\ListRequestHandle;
use Modules\Advertisement\Http\Requests\StoreRequestHandle;
use Modules\Advertisement\Http\Requests\UpdateRequestHandle;
use Modules\Advertisement\Repositories\TypeRepo;
use Modules\Advertisement\Services\ManageService;

class ManageAdvertisementController extends Controller
{
    /** @var ManageService $service */
    private $service;

    /**
     * ManageAdvertisementController constructor.
     */
    public function __construct()
    {
        $this->service = new ManageService();
    }

    /**
     * @param ListRequestHandle $request
     * @return \Illuminate\Database\Eloquent\Collection|\Modules\Advertisement\Entities\Advertisement[]
     */
    public function index(ListRequestHandle $request)
    {
        return $this->service->list($request);
    }

    /**
     * @param ListRequestHandle $request
     * @return int
     */
    public function total(ListRequestHandle $request)
    {
        return $this->service->total($request);
    }

    /**
     * @param StoreRequestHandle $request
     * @param Cloud $cloud
     * @return \Modules\Advertisement\Entities\Advertisement
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function store(StoreRequestHandle $request, Cloud $cloud)
    {
        return $this->service->add($request, $cloud);
    }

    /**
     * @param GetIdRequestHandle $request
     * @return \Modules\Advertisement\Entities\Advertisement|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function edit(GetIdRequestHandle $request)
    {
        return $this->service->info($request);
    }

    /**
     * @param UpdateRequestHandle $request
     * @param Cloud $cloud
     * @return \Modules\Advertisement\Entities\Advertisement|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function update(UpdateRequestHandle $request, Cloud $cloud)
    {
        return $this->service->update($request, $cloud);
    }

    /**
     * @param GetIdRequestHandle $request
     * @param Cloud $cloud
     * @return \Modules\Advertisement\Entities\Advertisement|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function delete(GetIdRequestHandle $request, Cloud $cloud)
    {
        return $this->service->delete($request, $cloud);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Modules\Advertisement\Entities\AdvertisementType[]
     */
    public function type()
    {
        return app(TypeRepo::class)->getEnable();
    }
}
