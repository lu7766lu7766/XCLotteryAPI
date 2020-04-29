<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 04:03
 */

namespace Modules\News\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\NewsClassifiedCodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class NewsClassifiedNodeDatabaseSeeder extends TreeNodeBindSeeder
{
    /**
     * 父節點名稱
     * @return string
     */
    protected function parentName(): string
    {
        return '新闻分类';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return NewsClassifiedCodeConstants::MANAGE_NEWS_CLASSIFIED;
    }

    /**
     * 子節點集合,key為子節點code,value為子節點名稱
     * nodes collect
     * node code put at key
     * node name put at value
     * @return Collection
     */
    protected function nodes(): Collection
    {
        return collect([
            NewsClassifiedCodeConstants::MANAGE_NEWS_CLASSIFIED_READ   => '新闻分类-读取',
            NewsClassifiedCodeConstants::MANAGE_NEWS_CLASSIFIED_UPDATE => '新闻分类-编辑',
        ]);
    }
}
