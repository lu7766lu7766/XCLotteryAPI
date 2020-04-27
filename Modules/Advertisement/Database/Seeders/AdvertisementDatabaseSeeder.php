<?php

namespace Modules\Advertisement\Database\Seeders;

use Illuminate\Database\Seeder;

class AdvertisementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([AdvertisementTypeSeeder::class, AdvertisementNodeSeeder::class]);
    }
}
