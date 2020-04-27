<?php

namespace Modules\Lottery\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\LotteryClassifiedCodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class LotteryClassifiedNodeDatabaseSeeder extends TreeNodeBindSeeder
{
    protected function parentName(): string
    {
        return '彩种分类';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED;
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
            LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_READ   => '彩种分类-读取',
            LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_CREATE => '彩种分类-新增',
            LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_UPDATE => '彩种分类-编辑',
            LotteryClassifiedCodeConstants::MANAGE_LOTTERY_CLASSIFIED_DELETE => '彩种分类-删除'
        ]);
    }
}
