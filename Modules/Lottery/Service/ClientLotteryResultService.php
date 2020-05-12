<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/29
 * Time: 上午 09:27
 */

namespace Modules\Lottery\Service;

use Modules\Lottery\Http\Requests\Client\LotteryResultListRequest;
use Modules\Lottery\Repositories\LotteryResultRepo;

class ClientLotteryResultService
{
    /**
     * @param LotteryResultListRequest $request
     * @return \Modules\Lottery\Entities\Lottery|null
     */
    public function list(LotteryResultListRequest $request)
    {
        $result = app(LotteryResultRepo::class)->getDrawResultList(
            $request->getLotteryId(),
            $request->getPeriod(),
            $request->getStartPeriod(),
            $request->getEndPeriod(),
            $request->getStart(),
            $request->getEnd(),
            $request->getLimit()
        );

        return is_null($result) ? $result : $result->load('classified');
    }
}
