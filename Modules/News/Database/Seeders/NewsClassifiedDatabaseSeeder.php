<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 04:12
 */

namespace Modules\News\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Modules\News\Constants\NewsClassifiedIdConstants;
use Modules\News\Repositories\NewsClassifiedRepo;

class NewsClassifiedDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now()->toDateTimeString();
        $newsClassified = [
            [
                'id'         => NewsClassifiedIdConstants::IMPORTANT,
                'name'       => '要闻',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'id'         => NewsClassifiedIdConstants::BONUS,
                'name'       => '派奖',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'id'         => NewsClassifiedIdConstants::JACKPOT,
                'name'       => '大奖',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'id'         => NewsClassifiedIdConstants::SITE_OWNER,
                'name'       => '站主',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'id'         => NewsClassifiedIdConstants::PROVINCE,
                'name'       => '各省',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'id'         => NewsClassifiedIdConstants::MEDIA,
                'name'       => '媒体',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'id'         => NewsClassifiedIdConstants::GLOBAL,
                'name'       => '环球',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'id'         => NewsClassifiedIdConstants::OTHER,
                'name'       => '其他',
                'created_at' => $time,
                'updated_at' => $time
            ],
        ];
        app(NewsClassifiedRepo::class)->create($newsClassified);
    }
}
