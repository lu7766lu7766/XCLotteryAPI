<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/15
 * Time: 下午 05:23
 */

namespace Modules\Lottery\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Entities\BaseORM;
use Modules\Files\Entities\EditorFilesUsedHelper;

/**
 * Class Lottery
 * @package Modules\Lottery\Entities
 * @property string image_path
 * @property string code
 * @property string rule
 */
class Lottery extends BaseORM
{
    use SoftDeletes, EditorFilesUsedHelper;
    protected $table = 'lottery';
    protected $fillable = [
        'name',
        'code',
        'enable',
        'rule'
    ];

    /**
     * @return BelongsToMany
     */
    public function classified()
    {
        return $this->belongsToMany(
            LotteryClassified::class,
            'lottery_classified_lottery',
            'lottery_id',
            'lottery_classified_id'
        )
            ->as('relations')
            ->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function drawResult()
    {
        return $this->hasMany(LotteryResult::class, 'lottery_id', 'id');
    }
}
