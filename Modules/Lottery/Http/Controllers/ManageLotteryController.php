<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/16
 * Time: 上午 10:34
 */

namespace Modules\Lottery\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Files\Http\Controllers\EditorFileUsed;
use Modules\Lottery\Entities\Lottery;
use Modules\Lottery\Http\Requests\Manage\LotteryInfoRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryListRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryUpdateRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryUpdateRuleRequest;
use Modules\Lottery\Repositories\LotteryClassifiedRepo;
use Modules\Lottery\Service\ManageLotteryService;

class ManageLotteryController extends Controller
{
    use EditorFileUsed;

    /**
     * @param LotteryListRequest $request
     * @return Collection|Lottery[]
     */
    public function list(LotteryListRequest $request)
    {
        return app(ManageLotteryService::class)->list($request);
    }

    /**
     * @param LotteryListRequest $request
     * @return int
     */
    public function total(LotteryListRequest $request)
    {
        return app(ManageLotteryService::class)->total($request);
    }

    /**
     * @param LotteryInfoRequest $request
     * @return Lottery
     * @throws ApiErrorCodeException
     */
    public function info(LotteryInfoRequest $request)
    {
        return app(ManageLotteryService::class)->info($request->getId());
    }

    /**
     * @param LotteryUpdateRequest $request
     * @param Cloud $cloud
     * @return Lottery
     * @throws ApiErrorCodeException
     */
    public function update(LotteryUpdateRequest $request, Cloud $cloud)
    {
        return app(ManageLotteryService::class)->update($request, $cloud);
    }

    /**
     * @param LotteryInfoRequest $request
     * @return Lottery|null
     * @throws ApiErrorCodeException
     */
    public function del(LotteryInfoRequest $request)
    {
        return app(ManageLotteryService::class)->del($request->getId());
    }

    /**
     * @return array
     */
    public function options()
    {
        return [
            'lottery_classified' => app(LotteryClassifiedRepo::class)->getAllEnable(),
            'enable'             => NYEnumConstants::enum()
        ];
    }

    /**
     * @param LotteryUpdateRuleRequest $request
     * @return Lottery|null
     * @throws ApiErrorCodeException
     * @throws \Throwable
     */
    public function updateRule(LotteryUpdateRuleRequest $request)
    {
        return app(ManageLotteryService::class)->updateRule($request);
    }
}
