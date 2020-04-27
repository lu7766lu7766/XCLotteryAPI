<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/1
 * Time: 下午 04:05
 */

namespace Modules\Cooperation\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Node\Constants\CooperationCodeConstants;
use Modules\Node\Contract\IGate;

class CooperationPolicy
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
        return $this->gate->hasAccess(CooperationCodeConstants::MANAGE_COOPERATION_READ);
    }

    /**
     * @return bool
     */
    public function create()
    {
        return $this->gate->hasAccess(CooperationCodeConstants::MANAGE_COOPERATION_CREATE);
    }

    /**
     * @return bool
     */
    public function update()
    {
        return $this->gate->hasAccess(CooperationCodeConstants::MANAGE_COOPERATION_UPDATE);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        return $this->gate->hasAccess(CooperationCodeConstants::MANAGE_COOPERATION_DELETE);
    }

    /**
     * @return bool
     */
    public function options()
    {
        return $this->gate->anyAccess([
            CooperationCodeConstants::MANAGE_COOPERATION_READ,
            CooperationCodeConstants::MANAGE_COOPERATION_CREATE,
            CooperationCodeConstants::MANAGE_COOPERATION_UPDATE
        ]);
    }
}
