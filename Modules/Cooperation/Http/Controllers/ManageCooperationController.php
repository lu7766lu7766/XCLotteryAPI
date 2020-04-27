<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/1
 * Time: 下午 04:08
 */

namespace Modules\Cooperation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Cooperation\Entities\Cooperation;
use Modules\Cooperation\Http\Requests\Manage\CooperationCreateRequest;
use Modules\Cooperation\Http\Requests\Manage\CooperationInfoRequest;
use Modules\Cooperation\Http\Requests\Manage\CooperationListRequest;
use Modules\Cooperation\Http\Requests\Manage\CooperationUpdateRequest;
use Modules\Cooperation\Service\ManageCooperationService;

class ManageCooperationController extends Controller
{
    /**
     * @param CooperationListRequest $request
     * @return Collection|\Modules\Cooperation\Entities\Cooperation[]
     */
    public function list(CooperationListRequest $request)
    {
        return app(ManageCooperationService::class)->list($request);
    }

    /**
     * @param CooperationListRequest $request
     * @return int
     */
    public function total(CooperationListRequest $request)
    {
        return app(ManageCooperationService::class)->total($request);
    }

    /**
     * @param CooperationInfoRequest $request
     * @return Cooperation
     * @throws ApiErrorCodeException
     */
    public function info(CooperationInfoRequest $request)
    {
        return app(ManageCooperationService::class)->info($request->getId());
    }

    /**
     * @param CooperationCreateRequest $request
     * @param Cloud $cloud
     * @return Cooperation
     * @throws ApiErrorCodeException
     */
    public function create(CooperationCreateRequest $request, Cloud $cloud)
    {
        return app(ManageCooperationService::class)->create($request, $cloud);
    }

    /**
     * @param CooperationUpdateRequest $request
     * @param Cloud $cloud
     * @return Cooperation|null
     * @throws ApiErrorCodeException
     */
    public function update(CooperationUpdateRequest $request, Cloud $cloud)
    {
        return app(ManageCooperationService::class)->update($request, $cloud);
    }

    /**
     * @param CooperationInfoRequest $request
     * @return Cooperation
     * @throws ApiErrorCodeException
     */
    public function del(CooperationInfoRequest $request)
    {
        return app(ManageCooperationService::class)->del($request->getId());
    }

    /**
     * @return array
     */
    public function options()
    {
        return [
            'enable'   => NYEnumConstants::enum(),
            'is_blank' => NYEnumConstants::enum()
        ];
    }
}
