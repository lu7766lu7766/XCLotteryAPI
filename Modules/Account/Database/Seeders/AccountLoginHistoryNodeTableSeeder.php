<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\NodeCodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class AccountLoginHistoryNodeTableSeeder extends TreeNodeBindSeeder
{
    /**
     * 父節點名稱
     * @return string
     */
    protected function parentName(): string
    {
        return '帳號登入歷程';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return NodeCodeConstants::ACCOUNT_LOGIN_HISTORY;
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
            NodeCodeConstants::ACCOUNT_LOGIN_HISTORY_READ => '帳號登入歷程-讀取'
        ]);
    }
}
