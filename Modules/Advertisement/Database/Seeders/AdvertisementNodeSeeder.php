<?php

namespace Modules\Advertisement\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\ManageAdvertisementNodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class AdvertisementNodeSeeder extends TreeNodeBindSeeder
{
    /**
     * 父節點名稱
     * @return string
     */
    protected function parentName(): string
    {
        return '广告轮播';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT;
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
            ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_READ   => '广告轮播-读取',
            ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_CREATE => '广告轮播-新增',
            ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_UPDATE => '广告轮播-编辑',
            ManageAdvertisementNodeConstants::MANAGE_ADVERTISEMENT_DELETE => '广告轮播-删除',
        ]);
    }
}
