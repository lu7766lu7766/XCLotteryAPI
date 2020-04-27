<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/21
 * Time: 下午 04:15
 */

namespace Modules\Lottery\Console;

use Illuminate\Console\Command;
use Modules\Lottery\Assistance\LotteryDrawResultCollector;
use Symfony\Component\Console\Input\InputOption;

class GetLotteryDrawResult extends Command
{
    /**
     * The console command name
     * @var string
     */
    protected $name = 'lottery:get-draw {code}';
    /**
     * The console command description
     * @var string
     */
    protected $description = 'get lottery draw result';

    /**
     * Execute the console command
     * @throws \Exception
     */
    public function handle()
    {
        $collector = app(LotteryDrawResultCollector::class);
        $collector->run(
            $this->getCode(),
            $this->getDate(),
            $this->getAllDay()
        );
        $this->info('{"code":' . $collector->getCode() . ',"msg":' . $collector->getMsg() . '}');
    }

    /**
     * @return string
     */
    protected function getCode(): string
    {
        return $this->option('code');
    }

    /**
     * @return string|null
     */
    protected function getDate()
    {
        return $this->option('date') ?? null;
    }

    /**
     * @return bool
     */
    protected function getAllDay()
    {
        return (bool)$this->option('all') ?? false;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return [
            ['code', 'c', InputOption::VALUE_REQUIRED, 'lottery game code'],
            ['date', 'd', InputOption::VALUE_OPTIONAL, 'date(format:YYYY-MM-DD),default value is today'],
            ['all', 'a', InputOption::VALUE_OPTIONAL, '0:default value,get latest list/ 1:catch all day'],
        ];
    }
}
