<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/30
 * Time: 下午 06:18
 */

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Modules\Base\Entities\BaseORM;
use function PHPUnit\Framework\StaticAnalysis\HappyPath\AssertIsObject\consume;
use XC\Independent\Kit\Support\Scalar\StringMaster;

/**
 * Class News
 * @package Modules\News\Entities
 * @property string post_time
 * @property string url
 * @property NewsFullText fullText
 */
class News extends BaseORM
{
    use SoftDeletes;
    protected $table = 'news';
    public $timestamps = false;
    protected $fillable = [
        'classified_id',
        'title',
        'description',
        'picture_url',
        'enable',
        'url',
        'post_time'
    ];

    /**
     * @return BelongsTo
     */
    public function classified()
    {
        return $this->belongsTo(NewsClassified::class);
    }

    /**
     * @return HasOne
     */
    public function fullText()
    {
        return $this->hasOne(NewsFullText::class);
    }
}
