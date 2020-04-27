<?php

namespace Modules\Lottery\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\LotteryResultCodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class LotteryResultNodeDatabaseSeeder extends TreeNodeBindSeeder
{
    protected function parentName(): string
    {
        return '开奖结果';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return LotteryResultCodeConstants::MANAGE_LOTTERY_RESULT;
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
            LotteryResultCodeConstants::MANAGE_LOTTERY_RESULT_READ   => '开奖结果-读取',
            LotteryResultCodeConstants::MANAGE_LOTTERY_RESULT_UPDATE => '开奖结果-编辑',
            LotteryResultCodeConstants::MANAGE_LOTTERY_RESULT_DELETE => '开奖结果-删除'
        ]);
    }
}
