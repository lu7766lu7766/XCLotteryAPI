<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/1
 * Time: 下午 03:52
 */

namespace Modules\Cooperation\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\CooperationCodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class CooperationNodeDatabaseSeeder extends TreeNodeBindSeeder
{
    protected function parentName(): string
    {
        return '友情链接';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return CooperationCodeConstants::MANAGE_COOPERATION;
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
            CooperationCodeConstants::MANAGE_COOPERATION_READ   => '友情链接-读取',
            CooperationCodeConstants::MANAGE_COOPERATION_CREATE => '友情链接-新增',
            CooperationCodeConstants::MANAGE_COOPERATION_UPDATE => '友情链接-编辑',
            CooperationCodeConstants::MANAGE_COOPERATION_DELETE => '友情链接-删除'
        ]);
    }
}
