<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/8
 * Time: 下午 04:17
 */

namespace Modules\Lottery\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Base\Entities\BaseORM;

/**
 * Class LotteryClassified
 * @package Modules\Lottery\Entities
 * @property string sequence
 * @property Lottery[]|Collection game
 */
class LotteryClassified extends BaseORM
{
    protected $table = 'lottery_classified';
    protected $fillable = [
        'name',
        'enable',
        'sequence'
    ];

    /**
     * @return BelongsToMany
     */
    public function game()
    {
        return $this->belongsToMany(
            Lottery::class,
            'lottery_classified_lottery',
            'lottery_classified_id',
            'lottery_id'
        )
            ->as('relations')
            ->withTimestamps();
    }
}
