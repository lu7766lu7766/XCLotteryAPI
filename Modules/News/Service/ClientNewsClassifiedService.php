<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/5
 * Time: 下午 06:23
 */

namespace Modules\News\Service;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\News\Entities\NewsClassified;
use Modules\News\Repositories\NewsClassifiedRepo;

class ClientNewsClassifiedService
{
    /**
     * @return Collection|NewsClassified[]
     */
    public function all()
    {
        return app(NewsClassifiedRepo::class)->list(null, NYEnumConstants::YES);
    }
}
