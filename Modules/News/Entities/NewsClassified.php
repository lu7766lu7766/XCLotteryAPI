<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 04:23
 */

namespace Modules\News\Entities;

use Modules\Base\Entities\BaseORM;

/**
 * Class NewsClassified
 * @package Modules\News\Entities
 * @property int id
 */
class NewsClassified extends BaseORM
{
    protected $table = 'news_classified';
    protected $fillable = [
        'name',
        'enable'
    ];
}
