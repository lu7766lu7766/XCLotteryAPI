<?php

namespace Modules\Role\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Node\Constants\NodeCodeConstants;
use Modules\Node\Contract\IGate;

class PublicRolePolicy
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
    public function manageRead()
    {
        return $this->gate->hasAccess(NodeCodeConstants::MANAGE_ROLE_CUSTOM_READ);
    }

    /**
     * @return bool
     */
    public function manageCreate()
    {
        return $this->gate->hasAccess(NodeCodeConstants::MANAGE_ROLE_CUSTOM_CREATE);
    }

    /**
     * @return bool
     */
    public function manageUpdate()
    {
        return $this->gate->hasAccess(NodeCodeConstants::MANAGE_ROLE_CUSTOM_UPDATE);
    }

    /**
     * @return bool
     */
    public function manageDel()
    {
        return $this->gate->hasAccess(NodeCodeConstants::MANAGE_ROLE_CUSTOM_DELETE);
    }

    /**
     * @return bool
     */
    public function authorization()
    {
        return $this->gate->hasAccess(NodeCodeConstants::ROLE_PUBLIC_AUTHORIZATION);
    }
}
