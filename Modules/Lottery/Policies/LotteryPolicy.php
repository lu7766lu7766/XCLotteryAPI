<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/16
 * Time: 上午 10:23
 */

namespace Modules\Lottery\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Node\Constants\LotteryCodeConstants;
use Modules\Node\Contract\IGate;

class LotteryPolicy
{
    use HandlesAuthorization;
    /**
     * @var IGate
     */
    private $gate;

    /**
     * Create a new policy instance.
     *
     * @param IGate $gate
     */
    public function __construct(IGate $gate)
    {
        $this->gate = $gate;
    }

    /**
     * @return bool
     */
    public function read()
    {
        return $this->gate->hasAccess(LotteryCodeConstants::MANAGE_LOTTERY_READ);
    }

    /**
     * @return bool
     */
    public function update()
    {
        return $this->gate->hasAccess(LotteryCodeConstants::MANAGE_LOTTERY_UPDATE);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        return $this->gate->hasAccess(LotteryCodeConstants::MANAGE_LOTTERY_DELETE);
    }

    /**
     * @return bool
     */
    public function options()
    {
        return $this->gate->anyAccess([
            LotteryCodeConstants::MANAGE_LOTTERY_READ,
            LotteryCodeConstants::MANAGE_LOTTERY_UPDATE
        ]);
    }
}
