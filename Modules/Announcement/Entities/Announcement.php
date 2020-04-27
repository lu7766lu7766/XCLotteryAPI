<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/31
 * Time: 上午 11:11
 */

namespace Modules\Announcement\Entities;

use Modules\Base\Entities\BaseORM;
use Modules\Files\Entities\EditorFilesUsedHelper;

/**
 * Class Announcement
 * @property string cover
 * @package Modules\Announcement\Entities
 */
class Announcement extends BaseORM
{
    use EditorFilesUsedHelper;
    protected $table = 'announcement';
    protected $fillable = [
        'title',
        'cover',
        'contents',
        'is_marquee',
        'is_top',
        'status',
    ];
}
