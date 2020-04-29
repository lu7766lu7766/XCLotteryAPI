<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 04:40
 */

namespace Modules\News\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Node\Constants\NewsClassifiedCodeConstants;
use Modules\Node\Constants\NewsCodeConstants;
use Modules\Node\Contract\IGate;

class NewsPolicy
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
        return $this->gate->hasAccess(NewsCodeConstants::MANAGE_NEWS_READ);
    }

    /**
     * @return bool
     */
    public function update()
    {
        return $this->gate->hasAccess(NewsCodeConstants::MANAGE_NEWS_UPDATE);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        return $this->gate->hasAccess(NewsCodeConstants::MANAGE_NEWS_DELETE);
    }

    /**
     * @return bool
     */
    public function options()
    {
        return $this->gate->anyAccess([
            NewsCodeConstants::MANAGE_NEWS_READ,
            NewsCodeConstants::MANAGE_NEWS_UPDATE
        ]);
    }
}
