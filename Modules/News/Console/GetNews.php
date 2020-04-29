<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/31
 * Time: 上午 11:27
 */

namespace Modules\News\Console;

use Illuminate\Console\Command;
use Modules\News\Assistance\NewsCollector;

class GetNews extends Command
{
    /**
     * The console command name
     * @var string
     */
    protected $signature = 'news:get-news';
    /**
     * The console command description
     * @var string
     */
    protected $description = 'get remote news list';

    /**
     * Execute the console command
     * @throws \Exception
     */
    public function handle()
    {
        $collector = app(NewsCollector::class);
        $collector->run();
        $this->info('code:' . $collector->getCode() . ',msg:' . $collector->getMsg());
    }
}
