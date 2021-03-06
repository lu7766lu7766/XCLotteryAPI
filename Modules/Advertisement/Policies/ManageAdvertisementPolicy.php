<?php

namespace Modules\Advertisement\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Node\Constants\ManageAdvertisementNodeConstants;
use Modules\Node\Contract\IGate;

class ManageAdvertisementPolicy
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
        return $this->gate->hasAccess(ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_READ);
    }

    /**
     * @return bool
     */
    public function create()
    {
        return $this->gate->hasAccess(ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_CREATE);
    }

    /**
     * @return bool
     */
    public function update()
    {
        return $this->gate->hasAccess(ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_UPDATE);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        return $this->gate->hasAccess(ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_DELETE);
    }

    /**
     * @return bool
     */
    public function type()
    {
        return $this->gate->anyAccess([
            ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_READ,
            ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_CREATE,
            ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_UPDATE,
        ]);
    }
}
