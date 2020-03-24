<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Account\Database\Seeders\AccountDatabaseSeeder;
use Modules\Account\Database\Seeders\AccountLoginHistoryNodeTableSeeder;
use Modules\Account\Database\Seeders\AccountNodeSeeder;
use Modules\Passport\Database\Seeders\PassportDatabaseSeeder;
use Modules\Role\Database\Seeders\RoleDatabaseSeeder;
use Modules\Role\Database\Seeders\RoleNodeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::reguard();
        // first : no relation seeder.
        $this->call(RoleDatabaseSeeder::class);
        // second : system core define seeder.
        $this->call(AccountDatabaseSeeder::class);
        $this->call(RoleNodeSeeder::class);
        $this->call(AccountNodeSeeder::class);
        $this->call(PassportDatabaseSeeder::class);
        $this->call(AccountLoginHistoryNodeTableSeeder::class);
        // third : your seeder
    }
}
