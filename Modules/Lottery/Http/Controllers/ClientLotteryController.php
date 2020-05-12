<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/7
 * Time: 下午 10:37
 */

namespace Modules\Lottery\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Lottery\Entities\Lottery;
use Modules\Lottery\Http\Requests\Client\LotteryInfoRequest;
use Modules\Lottery\Service\ClientLotteryService;

class ClientLotteryController extends Controller
{
    /**
     * @param LotteryInfoRequest $request
     * @return Lottery|null
     */
    public function info(LotteryInfoRequest $request)
    {
        return app(ClientLotteryService::class)->info($request->getId());
    }
}
