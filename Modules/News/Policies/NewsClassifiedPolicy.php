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
use Modules\Node\Contract\IGate;

class NewsClassifiedPolicy
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
        return $this->gate->hasAccess(NewsClassifiedCodeConstants::MANAGE_NEWS_CLASSIFIED_READ);
    }

    /**
     * @return bool
     */
    public function manageUpdate()
    {
        return $this->gate->hasAccess(NewsClassifiedCodeConstants::MANAGE_NEWS_CLASSIFIED_UPDATE);
    }

    /**
     * @return bool
     */
    public function options()
    {
        return $this->gate->anyAccess([
            NewsClassifiedCodeConstants::MANAGE_NEWS_CLASSIFIED_READ,
            NewsClassifiedCodeConstants::MANAGE_NEWS_CLASSIFIED_UPDATE
        ]);
    }
}
