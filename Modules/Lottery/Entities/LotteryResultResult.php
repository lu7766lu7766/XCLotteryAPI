<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/15
 * Time: 下午 05:23
 */

namespace Modules\Lottery\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Entities\BaseORM;

/**
 * Class Lottery
 * @package Modules\Lottery\Entities
 * @property string winning_numbers
 */
class LotteryResult extends BaseORM
{
    protected $table = 'lottery_result';
    protected $fillable = [
        'lottery_id',
        'period',
        'draw_time',
        'open_time',
        'close_time',
        'winning_numbers',
        'enable',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'winning_numbers' => 'array',
    ];

    /**
     * @return BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Lottery::class, 'lottery_id', 'id');
    }
}
