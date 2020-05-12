<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/29
 * Time: 上午 09:10
 */

namespace Modules\Lottery\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Lottery\Http\Requests\Client\LotteryResultListRequest;
use Modules\Lottery\Repositories\LotteryResultRepo;
use Modules\Lottery\Service\ClientLotteryResultService;

class ClientLotteryResultController extends Controller
{
    /**
     * @param LotteryResultListRequest $request
     * @return LotteryResultRepo|null
     */
    public function list(LotteryResultListRequest $request)
    {
        return app(ClientLotteryResultService::class)->list($request);
    }
}
