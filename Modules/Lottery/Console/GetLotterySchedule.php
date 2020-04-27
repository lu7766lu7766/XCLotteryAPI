<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/21
 * Time: 下午 04:15
 */

namespace Modules\Lottery\Console;

use Illuminate\Console\Command;
use Modules\Lottery\Assistance\LotteryScheduleCollector;
use Symfony\Component\Console\Input\InputOption;

class GetLotterySchedule extends Command
{
    /**
     * The console command name
     * @var string
     */
    protected $name = 'lottery:get-schedule';
    /**
     * The console command description
     * @var string
     */
    protected $description = 'get lottery schedule';

    /**
     * Execute the console command
     * @throws \Exception
     */
    public function handle()
    {
        $collector = app(LotteryScheduleCollector::class);
        $collector->run($this->getCode(), $this->getDate());
        $this->info('{"code":' . $collector->getCode() . ',"msg":' . $collector->getMsg() . '}');
    }

    /**
     * @return string|null
     */
    protected function getCode()
    {
        return $this->option('code') ?? null;
    }

    /**
     * @return string|null
     */
    protected function getDate()
    {
        return $this->option('date') ?? null;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return [
            ['code', 'c', InputOption::VALUE_OPTIONAL, 'lottery game code'],
            ['date', 'd', InputOption::VALUE_OPTIONAL, 'date(format:YYYY-MM-DD),default value is today']
        ];
    }
}
