<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/24
 * Time: 下午 06:03
 */

namespace Modules\Site\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Node\Constants\SiteCodeConstants;
use Modules\Node\Contract\IGate;

class SitePolicy
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
    public function manage()
    {
        return $this->gate->hasAccess(SiteCodeConstants::MANAGE_SITE);
    }

    /**
     * @return bool
     */
    public function manageRead()
    {
        return $this->gate->hasAccess(SiteCodeConstants::MANAGE_SITE_READ);
    }

    /**
     * @return bool
     */
    public function manageUpdate()
    {
        return $this->gate->hasAccess(SiteCodeConstants::MANAGE_SITE_UPDATE);
    }
}
