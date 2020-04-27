<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/25
 * Time: 上午 11:41
 */

namespace Modules\Site\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\SiteCodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class SiteNodeDatabaseSeeder extends TreeNodeBindSeeder
{
    /**
     * 父節點名稱
     * @return string
     */
    protected function parentName(): string
    {
        return '基本设置';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return SiteCodeConstants::MANAGE_SITE;
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
            SiteCodeConstants::MANAGE_SITE_READ   => '基本设置-读取',
            SiteCodeConstants::MANAGE_SITE_UPDATE => '基本设置-编辑',
        ]);
    }
}
