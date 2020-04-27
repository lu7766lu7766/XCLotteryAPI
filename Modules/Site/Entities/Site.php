<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/24
 * Time: 下午 06:20
 */

namespace Modules\Site\Entities;

use Modules\Base\Entities\BaseORM;

/**
 * Class Site
 * @package Modules\Site\Entities
 * @property string logo_path
 * @property string ios_qr_path
 * @property string android_qr_path
 */
class Site extends BaseORM
{
    protected $table = 'site';
    protected $fillable = [
        'title',
        'logo_path',
        'copyright',
        'icp',
        'contact',
        'ios_qr_path',
        'android_qr_path'
    ];
    protected $casts = [
        'contact' => 'array',
    ];
}
