<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 04:03
 */

namespace Modules\News\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\NewsCodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class NewsNodeDatabaseSeeder extends TreeNodeBindSeeder
{
    /**
     * 父節點名稱
     * @return string
     */
    protected function parentName(): string
    {
        return '新闻管理';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return NewsCodeConstants::MANAGE_NEWS;
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
            NewsCodeConstants::MANAGE_NEWS_READ   => '新闻管理-读取',
            NewsCodeConstants::MANAGE_NEWS_UPDATE => '新闻管理-编辑',
            NewsCodeConstants::MANAGE_NEWS_DELETE => '新闻管理-删除',
        ]);
    }
}
