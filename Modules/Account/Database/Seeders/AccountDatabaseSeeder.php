<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Account\Service\AdminAccountService;
use Modules\Role\Constants\RoleInherentConstants;

class AccountDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Throwable
     */
    public function run()
    {
        $service = \App::make(AdminAccountService::class);
        $service->createAdmin();
        $param = [
            'account'      => '',
            'display_name' => '管理員',
            'mail'         => '@house.cc',
            'phone'        => '3939889',
            'status'       => 'enable'
        ];
        $addUserList = [
            'house',
            'aaron',
            'jacc',
            'funny',
            'derek',
            'xced',
            'arxing',
            'yanchen',
            'water'
        ];
        foreach ($addUserList as $user) {
            $password = $user . 'is666';
            $param['account'] = $user;
            $param['display_name'] = $user . '系统管理员';
            $param['mail'] = $user . '@house.cc';
            $service->create($param, $password, RoleInherentConstants::SYSTEM_MANAGER);
        }
    }
}
