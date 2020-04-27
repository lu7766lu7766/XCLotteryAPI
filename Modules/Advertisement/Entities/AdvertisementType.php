<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/25
 * Time: 下午 04:21
 */

namespace Modules\Advertisement\Entities;

use Modules\Base\Entities\BaseORM;

class AdvertisementType extends BaseORM
{
    protected $table = 'advertisement_type';
    protected $fillable = [
        'code',
        'name',
        'status'
    ];
}
