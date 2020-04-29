<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Account\Database\Seeders\AccountDatabaseSeeder;
use Modules\Account\Database\Seeders\AccountLoginHistoryNodeTableSeeder;
use Modules\Account\Database\Seeders\AccountNodeSeeder;
use Modules\News\Database\Seeders\NewsClassifiedDatabaseSeeder;
use Modules\News\Database\Seeders\NewsClassifiedNodeDatabaseSeeder;
use Modules\News\Database\Seeders\NewsNodeDatabaseSeeder;
use Modules\Lottery\Database\Seeders\LotteryClassifiedNodeDatabaseSeeder;
use Modules\Lottery\Database\Seeders\LotteryItemDatabaseSeeder;
use Modules\Lottery\Database\Seeders\LotteryNodeDatabaseSeeder;
use Modules\Lottery\Database\Seeders\LotteryResultNodeDatabaseSeeder;
use Modules\Cooperation\Database\Seeders\CooperationNodeDatabaseSeeder;
use Modules\Advertisement\Database\Seeders\AdvertisementDatabaseSeeder;
use Modules\Copywriting\Database\Seeders\CopywritingNodeDatabaseSeeder;
use Modules\Announcement\Database\Seeders\AnnouncementNodeSeeder;
use Modules\Passport\Database\Seeders\PassportDatabaseSeeder;
use Modules\Role\Database\Seeders\RoleDatabaseSeeder;
use Modules\Role\Database\Seeders\RoleNodeSeeder;
use Modules\Site\Database\Seeders\SiteNodeDatabaseSeeder;

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
        $this->call(SiteNodeDatabaseSeeder::class);
        $this->call(AnnouncementNodeSeeder::class);
        $this->call(CopywritingNodeDatabaseSeeder::class);
        $this->call(AdvertisementDatabaseSeeder::class);
        $this->call(CooperationNodeDatabaseSeeder::class);
        $this->call(LotteryClassifiedNodeDatabaseSeeder::class);
        $this->call(LotteryNodeDatabaseSeeder::class);
        $this->call(LotteryItemDatabaseSeeder::class);
        $this->call(LotteryResultNodeDatabaseSeeder::class);
        $this->call(NewsClassifiedNodeDatabaseSeeder::class);
        $this->call(NewsClassifiedDatabaseSeeder::class);
        $this->call(NewsNodeDatabaseSeeder::class);
    }
}
