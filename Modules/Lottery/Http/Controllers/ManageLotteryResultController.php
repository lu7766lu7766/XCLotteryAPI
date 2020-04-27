<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/20
 * Time: 上午 10:21
 */

namespace Modules\Lottery\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Lottery\Entities\LotteryResult;
use Modules\Lottery\Http\Requests\Manage\LotteryResultInfoRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryResultListRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryResultUpdateRequest;
use Modules\Lottery\Repositories\LotteryClassifiedRepo;
use Modules\Lottery\Repositories\LotteryRepo;
use Modules\Lottery\Service\ManageLotteryResultService;

class ManageLotteryResultController extends Controller
{
    /**
     * @param LotteryResultListRequest $request
     * @return Collection|LotteryResult[]
     */
    public function list(LotteryResultListRequest $request)
    {
        return app(ManageLotteryResultService::class)->list($request);
    }

    /**
     * @param LotteryResultListRequest $request
     * @return int
     */
    public function total(LotteryResultListRequest $request)
    {
        return app(ManageLotteryResultService::class)->total($request);
    }

    /**
     * @param LotteryResultInfoRequest $request
     * @return LotteryResult|null
     * @throws ApiErrorCodeException
     */
    public function info(LotteryResultInfoRequest $request)
    {
        return app(ManageLotteryResultService::class)->info($request->getId());
    }

    /**
     * @param LotteryResultUpdateRequest $request
     * @return LotteryResult
     * @throws ApiErrorCodeException
     */
    public function update(LotteryResultUpdateRequest $request)
    {
        return app(ManageLotteryResultService::class)->update($request);
    }

    /**
     * @param LotteryResultInfoRequest $request
     * @return LotteryResult
     * @throws ApiErrorCodeException
     */
    public function del(LotteryResultInfoRequest $request)
    {
        return app(ManageLotteryResultService::class)->del($request->getId());
    }

    /**
     * @return array
     */
    public function options()
    {
        return [
            'lottery_classified' => app(LotteryClassifiedRepo::class)->getAllEnable(),
            'lottery_game'       => app(LotteryRepo::class)->getAllEnable(),
            'enable'             => NYEnumConstants::enum(),
        ];
    }
}
