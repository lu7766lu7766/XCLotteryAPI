<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/6
 * Time: 下午 04:37
 */

namespace Modules\Copywriting\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Copywriting\Entities\Copywriting;
use Modules\Copywriting\Http\Requests\Manage\CopywritingCreateRequest;
use Modules\Copywriting\Http\Requests\Manage\CopywritingInfoRequest;
use Modules\Copywriting\Http\Requests\Manage\CopywritingListRequest;
use Modules\Copywriting\Http\Requests\Manage\CopywritingUpdateRequest;
use Modules\Copywriting\Service\ManageCopywritingService;
use Modules\Files\Http\Controllers\EditorFileUsed;

class ManageCopywritingController extends Controller
{
    use EditorFileUsed;

    /**
     * @param CopywritingListRequest $request
     * @return Collection|Copywriting[]
     */
    public function list(CopywritingListRequest $request)
    {
        return app(ManageCopywritingService::class)->list($request);
    }

    /**
     * @param CopywritingListRequest $request
     * @return int
     */
    public function total(CopywritingListRequest $request)
    {
        return app(ManageCopywritingService::class)->total($request);
    }

    /**
     * @param CopywritingInfoRequest $request
     * @return Copywriting
     * @throws ApiErrorCodeException
     */
    public function info(CopywritingInfoRequest $request)
    {
        return app(ManageCopywritingService::class)->info($request->getId());
    }

    /**
     * @param CopywritingCreateRequest $request
     * @return Copywriting
     * @throws \Throwable
     */
    public function create(CopywritingCreateRequest $request)
    {
        return app(ManageCopywritingService::class)->create($request);
    }

    /**
     * @param CopywritingUpdateRequest $request
     * @return Copywriting|null
     * @throws ApiErrorCodeException
     * @throws \Throwable
     */
    public function update(CopywritingUpdateRequest $request)
    {
        return app(ManageCopywritingService::class)->update($request);
    }

    /**
     * @param CopywritingInfoRequest $request
     * @param Cloud $cloud
     * @return Copywriting|null
     * @throws ApiErrorCodeException
     * @throws \Throwable
     */
    public function del(CopywritingInfoRequest $request, Cloud $cloud)
    {
        return app(ManageCopywritingService::class)->del($request->getId(), $cloud);
    }

    /**
     * @return array
     */
    public function options()
    {
        return ['enable' => NYEnumConstants::enum()];
    }
}
