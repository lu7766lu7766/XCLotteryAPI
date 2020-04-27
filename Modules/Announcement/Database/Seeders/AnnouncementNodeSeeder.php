<?php

namespace Modules\Announcement\Database\Seeders;

use Illuminate\Support\Collection;
use Modules\Node\Constants\AnnouncementNodeConstants;
use Modules\Node\Database\Seeders\TreeNodeBindSeeder;

class AnnouncementNodeSeeder extends TreeNodeBindSeeder
{
    /**
     * 父節點名稱
     * @return string
     */
    protected function parentName(): string
    {
        return '公告管理';
    }

    /**
     * 父節點代碼
     * @return string
     */
    protected function parentCode(): string
    {
        return AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT;
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
            AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_READ   => '公告管理-读取',
            AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_CREATE => '公告管理-新增',
            AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_UPDATE => '公告管理-编辑',
            AnnouncementNodeConstants::MANAGE_ANNOUNCEMENT_DELETE => '公告管理-删除',
        ]);
    }
}
