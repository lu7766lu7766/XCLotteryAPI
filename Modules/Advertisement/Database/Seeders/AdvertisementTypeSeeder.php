<?php

namespace Modules\Advertisement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Advertisement\Constants\TypeConstants;
use Modules\Advertisement\Services\ManageTypeService;

class AdvertisementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function run()
    {
        $service = new ManageTypeService();
        $defaultData = TypeConstants::list();
        foreach ($defaultData as $key => $row) {
            $service->create($key, $row);
        }
    }
}
