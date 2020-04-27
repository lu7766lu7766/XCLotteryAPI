<?php

namespace Modules\Lottery\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Lottery\Constants\LotteryCodeConstants;
use Modules\Lottery\Entities\Lottery;
use Modules\Lottery\Repositories\LotteryRepo;

class LotteryItemDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repo = app(LotteryRepo::class);
        $codes = Collection::make(LotteryCodeConstants::mapping());
        $codes->each(function (string $name, string $code) use ($repo) {
            $lottery = app(Lottery::class)->fill([
                'name'   => $name,
                'code'   => $code,
                'enable' => NYEnumConstants::YES
            ]);
            $repo->saveData($lottery);
        });
    }
}
