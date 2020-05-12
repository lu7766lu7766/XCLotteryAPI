<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/28
 * Time: 上午 10:54
 */

namespace Modules\Lottery\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Lottery\Entities\LotteryClassified;
use Modules\Lottery\Http\Requests\Client\LotteryClassifiedListRequest;
use Modules\Lottery\Service\ClientLotteryClassifiedService;
use phpDocumentor\Reflection\Types\Collection;

class ClientLotteryClassifiedController extends Controller
{
    /**
     * @return Collection|LotteryClassified[]
     */
    public function all()
    {
        return app(ClientLotteryClassifiedService::class)->all();
    }

    /**
     * @param LotteryClassifiedListRequest $request
     * @return LotteryClassified|null
     */
    public function list(LotteryClassifiedListRequest $request)
    {
        return app(ClientLotteryClassifiedService::class)->list($request->getId());
    }
}
