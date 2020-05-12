<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/30
 * Time: 下午 06:20
 */

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Entities\BaseORM;

/**
 * Class NewsFullText
 * @package Modules\News\Entities
 * @property string enable
 */
class NewsFullText extends BaseORM
{
    protected $table = 'news_full_text';
    protected $fillable = [
        'news_id',
        'title',
        'content'
    ];

    /**
     * @return BelongsTo
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
