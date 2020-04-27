<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/8
 * Time: 下午 04:15
 */

namespace Modules\Lottery\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Lottery\Entities\LotteryClassified;
use Modules\Lottery\Http\Requests\Manage\LotteryClassifiedCreateRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryClassifiedInfoRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryClassifiedListRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryClassifiedUpdateRequest;
use Modules\Lottery\Service\ManageLotteryClassifiedService;

class ManageLotteryClassifiedController extends Controller
{
    /**
     * @param LotteryClassifiedListRequest $request
     * @return Collection|LotteryClassified[]
     */
    public function list(LotteryClassifiedListRequest $request)
    {
        return app(ManageLotteryClassifiedService::class)->list($request);
    }

    /**
     * @param LotteryClassifiedListRequest $request
     * @return int
     */
    public function total(LotteryClassifiedListRequest $request)
    {
        return app(ManageLotteryClassifiedService::class)->total($request);
    }

    /**
     * @param LotteryClassifiedInfoRequest $request
     * @return LotteryClassified
     * @throws ApiErrorCodeException
     */
    public function info(LotteryClassifiedInfoRequest $request)
    {
        return app(ManageLotteryClassifiedService::class)->info($request->getId());
    }

    /**
     * @param LotteryClassifiedCreateRequest $request
     * @return LotteryClassified
     * @throws ApiErrorCodeException
     */
    public function create(LotteryClassifiedCreateRequest $request)
    {
        return app(ManageLotteryClassifiedService::class)->create($request);
    }

    /**
     * @param LotteryClassifiedUpdateRequest $request
     * @return LotteryClassified
     * @throws ApiErrorCodeException
     */
    public function update(LotteryClassifiedUpdateRequest $request)
    {
        return app(ManageLotteryClassifiedService::class)->update($request);
    }

    /**
     * @param LotteryClassifiedInfoRequest $request
     * @return LotteryClassified
     * @throws ApiErrorCodeException
     */
    public function del(LotteryClassifiedInfoRequest $request)
    {
        return app(ManageLotteryClassifiedService::class)->del($request->getId());
    }

    /**
     * @return array
     */
    public function options()
    {
        return [
            'enable' => NYEnumConstants::enum()
        ];
    }
}
