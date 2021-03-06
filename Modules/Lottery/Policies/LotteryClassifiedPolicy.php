<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/8
 * Time: 下午 04:10
 */

namespace Modules\Lottery\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Node\Constants\LotteryClassifiedCodeConstants;
use Modules\Node\Contract\IGate;

class LotteryClassifiedPolicy
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
        return $this->gate->hasAccess(LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_READ);
    }

    /**
     * @return bool
     */
    public function create()
    {
        return $this->gate->hasAccess(LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_CREATE);
    }

    /**
     * @return bool
     */
    public function update()
    {
        return $this->gate->hasAccess(LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_UPDATE);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        return $this->gate->hasAccess(LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_DELETE);
    }

    /**
     * @return bool
     */
    public function options()
    {
        return $this->gate->anyAccess([
            LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_READ,
            LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_CREATE,
            LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_UPDATE
        ]);
    }
}
