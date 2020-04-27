<?php

namespace Modules\Copywriting\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\CopywritingNodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class CopywritingNodeDatabaseSeeder extends TreeNodeBindSeeder
{
    protected function parentName(): string
    {
        return '页面管理';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return CopywritingNodeConstants::MANAGE_COPYWRITING;
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
            CopywritingNodeConstants::MANAGE_COPYWRITING_READ   => '页面管理-读取',
            CopywritingNodeConstants::MANAGE_COPYWRITING_CREATE => '页面管理-新增',
            CopywritingNodeConstants::MANAGE_COPYWRITING_UPDATE => '页面管理-编辑',
            CopywritingNodeConstants::MANAGE_COPYWRITING_DELETE => '页面管理-删除'
        ]);
    }
}
