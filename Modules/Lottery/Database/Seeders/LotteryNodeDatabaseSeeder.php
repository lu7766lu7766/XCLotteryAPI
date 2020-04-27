<?php

namespace Modules\Lottery\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\LotteryCodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class LotteryNodeDatabaseSeeder extends TreeNodeBindSeeder
{
    protected function parentName(): string
    {
        return '彩种设置';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return LotteryCodeConstants::MANAGE_LOTTERY;
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
            LotteryCodeConstants::MANAGE_LOTTERY_READ   => '彩种设置-读取',
            LotteryCodeConstants::MANAGE_LOTTERY_UPDATE => '彩种设置-编辑',
            LotteryCodeConstants::MANAGE_LOTTERY_DELETE => '彩种设置-删除'
        ]);
    }
}
