<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\NodeCodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class AccountNodeSeeder extends TreeNodeBindSeeder
{
    /**
     * 父節點名稱
     * @return string
     */
    protected function parentName(): string
    {
        return '帳號管理';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return NodeCodeConstants::MANAGE_ACCOUNT;
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
            NodeCodeConstants::MANAGE_ACCOUNT_READ   => '帳號管理-讀取',
            NodeCodeConstants::MANAGE_ACCOUNT_CREATE => '帳號管理-新增',
            NodeCodeConstants::MANAGE_ACCOUNT_UPDATE => '帳號管理-編輯',
            NodeCodeConstants::MANAGE_ACCOUNT_DELETE => '帳號管理-刪除'
        ]);
    }
}
