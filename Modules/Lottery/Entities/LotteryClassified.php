<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/8
 * Time: 下午 04:17
 */

namespace Modules\Lottery\Entities;

use Modules\Base\Entities\BaseORM;

class LotteryClassified extends BaseORM
{
    protected $table = 'lottery_classified';
    protected $fillable = [
        'name',
        'enable'
    ];
}
