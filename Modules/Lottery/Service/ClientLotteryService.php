<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/7
 * Time: 下午 10:54
 */

namespace Modules\Lottery\Service;

use Modules\Lottery\Entities\Lottery;
use Modules\Lottery\Repositories\LotteryRepo;

class ClientLotteryService
{
    /**
     * @param int $id
     * @return Lottery|null
     */
    public function info(int $id)
    {
        return app(LotteryRepo::class)->findEnableById($id);
    }
}
