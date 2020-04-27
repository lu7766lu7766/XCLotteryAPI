<?php

namespace Modules\Announcement\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Node\Constants\AnnouncementNodeConstants;
use Modules\Node\Contract\IGate;

class ManageAnnouncementPolicy
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
        return $this->gate->hasAccess(AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_READ);
    }

    /**
     * @return bool
     */
    public function create()
    {
        return $this->gate->hasAccess(AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_CREATE);
    }

    /**
     * @return bool
     */
    public function update()
    {
        return $this->gate->hasAccess(AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_UPDATE);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        return $this->gate->hasAccess(AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_DELETE);
    }

    /**
     * @return bool
     */
    public function editorFile()
    {
        return $this->gate->anyAccess(
            [
                AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_CREATE,
                AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_UPDATE,
            ]
        );
    }

    /**
     * @return bool
     */
    public function options()
    {
        return $this->gate->anyAccess(
            [
                AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_READ,
                AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_CREATE,
                AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_UPDATE,
            ]
        );
    }
}
