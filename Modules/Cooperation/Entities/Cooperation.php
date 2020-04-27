<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/1
 * Time: 下午 03:55
 */

namespace Modules\Cooperation\Entities;

use Modules\Base\Entities\BaseORM;

/**
 * Class Cooperation
 * @package Modules\Cooperation\Entities
 * @property string image_path
 */
class Cooperation extends BaseORM
{
    protected $table = 'cooperation';
    protected $fillable = [
        'title',
        'link',
        'image_path',
        'enable',
        'is_blank'
    ];
}
