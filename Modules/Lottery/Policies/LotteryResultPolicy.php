<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/8
 * Time: 下午 04:10
 */

namespace Modules\Lottery\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Node\Constants\LotteryResultCodeConstants;
use Modules\Node\Contract\IGate;

class LotteryResultPolicy
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
        return $this->gate->hasAccess(LotteryResultCodeConstants::MANAGE_LOTTERY_RESULT_READ);
    }

    /**
     * @return bool
     */
    public function update()
    {
        return $this->gate->hasAccess(LotteryResultCodeConstants::MANAGE_LOTTERY_RESULT_UPDATE);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        return $this->gate->hasAccess(LotteryResultCodeConstants::MANAGE_LOTTERY_RESULT_DELETE);
    }
}
