<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/28
 * Time: 上午 11:18
 */

namespace Modules\Lottery\Service;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Lottery\Entities\LotteryClassified;
use Modules\Lottery\Repositories\LotteryClassifiedRepo;

class ClientLotteryClassifiedService
{
    /**
     * @return Collection|LotteryClassified[]
     */
    public function all()
    {
        return app(LotteryClassifiedRepo::class)->getAllEnable()
            ->load([
                'game' => function (BelongsToMany $builder) {
                    $builder->where('lottery.enable', NYEnumConstants::YES);
                }
            ]);
    }

    /**
     * @param int $id
     * @return LotteryClassified|null
     */
    public function list(int $id)
    {
        $result = app(LotteryClassifiedRepo::class)->findEnableById($id);

        return is_null($result) ? null : $result->load('game');
    }
}
