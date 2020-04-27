<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/6
 * Time: 下午 04:26
 */

namespace Modules\Copywriting\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Node\Constants\CopywritingNodeConstants;
use Modules\Node\Contract\IGate;

class CopywritingPolicy
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
        return $this->gate->hasAccess(CopywritingNodeConstants::MANAGE_COPYWRITING_READ);
    }

    /**
     * @return bool
     */
    public function create()
    {
        return $this->gate->hasAccess(CopywritingNodeConstants::MANAGE_COPYWRITING_CREATE);
    }

    /**
     * @return bool
     */
    public function update()
    {
        return $this->gate->hasAccess(CopywritingNodeConstants::MANAGE_COPYWRITING_UPDATE);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        return $this->gate->hasAccess(CopywritingNodeConstants::MANAGE_COPYWRITING_DELETE);
    }

    /**
     * @return bool
     */
    public function editorFile()
    {
        return $this->gate->anyAccess([
            CopywritingNodeConstants::MANAGE_COPYWRITING_CREATE,
            CopywritingNodeConstants::MANAGE_COPYWRITING_UPDATE
        ]);
    }

    /**
     * @return bool
     */
    public function options()
    {
        return $this->gate->anyAccess([
            CopywritingNodeConstants::MANAGE_COPYWRITING_READ,
            CopywritingNodeConstants::MANAGE_COPYWRITING_CREATE,
            CopywritingNodeConstants::MANAGE_COPYWRITING_UPDATE
        ]);
    }
}
