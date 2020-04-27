<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/6
 * Time: 下午 05:11
 */

namespace Modules\Copywriting\Entities;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Entities\BaseORM;
use Modules\Files\Entities\EditorFiles;
use Modules\Files\Entities\EditorFilesUsedHelper;

/**
 * Class Copywriting
 * @package Modules\Copywriting\Entities
 * @property EditorFiles[]|Collection editorFiles
 */
class Copywriting extends BaseORM
{
    use EditorFilesUsedHelper;
    protected $table = 'copywriting';
    protected $fillable = [
        'title',
        'code',
        'content',
        'enable'
    ];
}
