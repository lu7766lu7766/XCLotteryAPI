<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\NodeCodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class RoleNodeSeeder extends TreeNodeBindSeeder
{
    /**
     * 父節點名稱
     * @return string
     */
    protected function parentName(): string
    {
        return '角色設定';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return NodeCodeConstants::MANAGE_ROLE_CUSTOM;
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
            NodeCodeConstants::MANAGE_ROLE_CUSTOM_READ   => '角色設定-讀取',
            NodeCodeConstants::MANAGE_ROLE_CUSTOM_CREATE => '角色設定-新增',
            NodeCodeConstants::MANAGE_ROLE_CUSTOM_UPDATE => '角色設定-編輯',
            NodeCodeConstants::MANAGE_ROLE_CUSTOM_DELETE => '角色設定-刪除',
            NodeCodeConstants::ROLE_PUBLIC_AUTHORIZATION => '角色設定-權限'
        ]);
    }
}
