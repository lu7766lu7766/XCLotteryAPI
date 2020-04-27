<?php

namespace Modules\Announcement\Http\Controllers;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Routing\Controller;
use Modules\Announcement\Http\Requests\GetIdRequestHandle;
use Modules\Announcement\Http\Requests\ListRequestHandle;
use Modules\Announcement\Http\Requests\StoreRequestHandle;
use Modules\Announcement\Http\Requests\UpdateRequestHandle;
use Modules\Announcement\Services\ManageAnnounceService;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Files\Http\Controllers\EditorFileUsed;

class ManageAnnouncementController extends Controller
{
    use EditorFileUsed;
    /** @var ManageAnnounceService $service */
    private $service;

    /**
     * ManageAnnouncementController constructor.
     * @param ManageAnnounceService $service
     */
    public function __construct(ManageAnnounceService $service)
    {
        $this->service = $service;
    }

    /**
     * @param ListRequestHandle $request
     * @return \Illuminate\Database\Eloquent\Collection|\Modules\Announcement\Entities\Announcement[]
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
     * @return \Modules\Announcement\Entities\Announcement
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     * @throws \Throwable
     */
    public function store(StoreRequestHandle $request, Cloud $cloud)
    {
        return $this->service->create($request, $cloud);
    }

    /**
     * @param GetIdRequestHandle $request
     * @return \Modules\Announcement\Entities\Announcement|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function edit(GetIdRequestHandle $request)
    {
        return $this->service->edit($request);
    }

    /**
     * @param UpdateRequestHandle $request
     * @param Cloud $cloud
     * @return \Modules\Announcement\Entities\Announcement
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     * @throws \Throwable
     */
    public function update(UpdateRequestHandle $request, Cloud $cloud)
    {
        return $this->service->update($request, $cloud);
    }

    /**
     * @param GetIdRequestHandle $request
     * @param Cloud $cloud
     * @return \Modules\Announcement\Entities\Announcement
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     * @throws \Throwable
     */
    public function delete(GetIdRequestHandle $request, Cloud $cloud)
    {
        return $this->service->delete($request, $cloud);
    }

    /**
     * @return array
     */
    public function options()
    {
        return NYEnumConstants::enum();
    }
}
