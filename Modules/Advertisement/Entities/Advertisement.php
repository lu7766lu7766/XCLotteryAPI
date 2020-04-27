<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/26
 * Time: 上午 10:03
 */

namespace Modules\Advertisement\Entities;

use Modules\Base\Entities\BaseORM;

/**
 * Class Advertisement
 * @property string image_path
 * @package Modules\Advertisement\Entities
 */
class Advertisement extends BaseORM
{
    protected $table = 'advertisement';
    protected $fillable = [
        'title',
        'image_path',
        'is_blank',
        'url',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(AdvertisementType::class, 'type_id', 'id');
    }
}
