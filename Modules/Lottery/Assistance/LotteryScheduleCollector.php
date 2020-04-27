<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/21
 * Time: 上午 09:23
 */

namespace Modules\Lottery\Assistance;

use Caipiao\Client;
use Caipiao\Response\AllGameByDayResponse;
use Caipiao\Response\DTO\RoundDTO;
use Illuminate\Support\Carbon;
use Modules\Lottery\Entities\Lottery;
use Modules\Lottery\Entities\LotteryResult;
use Modules\Lottery\Repositories\LotteryRepo;
use Modules\Lottery\Repositories\LotteryResultRepo;

class LotteryScheduleCollector
{
    /** @var Client */
    private $client;
    /** @var int */
    private $code;
    /** @var string */
    private $msg;

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * LotteryWinningNumbersCollector constructor.
     */
    public function __construct()
    {
        $this->client = new Client(
            config('Lottery.config.caipiao_api_uid'),
            config('Lottery.config.caipiao_api_token'),
            config('Lottery.config.caipiao_api_url'),
            config('Lottery.config.caipiao_api_site')
        );
    }

    /**
     * @param string|null $lotteryCode
     * @param string|null $date
     */
    public function run(string $lotteryCode = null, string $date = null)
    {
        $date = $date ?? Carbon::now()->toDateString();
        $codeList = app(LotteryRepo::class)->getListByCode($lotteryCode);
        $codeList->each(function (Lottery $orm) use ($date) {
            $response = $this->client->getAllGameByDay($orm->code, $date);
            if (!$response->isErrorOccur()) {
                try {
                    $attributes = $this->handleResponse($response, $orm->code, $date);
                    app(LotteryResultRepo::class)->insert($attributes);
                } catch (\Throwable $e) {
                    $this->code = $e->getCode();
                    $this->msg = $e->getMessage();
                }
            }
        });
    }

    /**
     * @param AllGameByDayResponse $response
     * @param string $lotteryCode
     * @param string $date
     * @return array|RoundDTO[]
     * @throws \Exception
     */
    private function handleResponse(
        AllGameByDayResponse $response,
        string $lotteryCode,
        string $date
    ) {
        $lottery = app(LotteryRepo::class)->findByCode($lotteryCode);
        if (is_null($lottery)) {
            throw new \Exception('Not found match lottery.', -9999);
        }
        $this->code = $response->getCode();
        $this->msg = $response->getMsg();
        $now = Carbon::now();

        return $response->get(function (RoundDTO $game) use ($lottery, $date, $now) {
            $orm = new  LotteryResult();
            $orm->game()->associate($lottery)
                ->fill([
                    'period'     => $game->getGid(),
                    'draw_time'  => $game->getTime(),
                    'open_time'  => $game->getOpenTime(),
                    'close_time' => $game->getCloseTime(),
                    'created_at' => $now->toDateTimeString(),
                    'updated_at' => $now->toDateTimeString()
                ]);

            return $orm->attributesToArray();
        });
    }
}
