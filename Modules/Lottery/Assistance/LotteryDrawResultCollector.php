<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/21
 * Time: 上午 09:41
 */

namespace Modules\Lottery\Assistance;

use Caipiao\Client;
use Caipiao\Response\DrawListResponse;
use Caipiao\Response\DTO\DrawDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Modules\Lottery\Entities\Lottery;
use Modules\Lottery\Entities\LotteryResult;
use Modules\Lottery\Repositories\LotteryRepo;
use Modules\Lottery\Repositories\LotteryResultRepo;
use XC\Independent\Kit\Support\Scalar\ArrayMaster;

class LotteryDrawResultCollector
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
     * @param string $lotteryCode
     * @param string|null $date
     * @param bool $updateAll
     * @throws \Exception
     */
    public function run(string $lotteryCode, string $date = null, $updateAll = false)
    {
        $lottery = app(LotteryRepo::class)->findByCode($lotteryCode);
        if (is_null($lottery)) {
            throw new \Exception('Not found match lottery.', -9999);
        }
        $repo = app(LotteryResultRepo::class);
        $lotteryResult = $repo->findUnDrawByDateTime(
            $lotteryCode,
            Carbon::now()->subHours(1)->toDateTimeString(),
            Carbon::now()->toDateTimeString()
        );
        if ($lotteryResult->isNotEmpty()) {
            $date = $date ?? Carbon::now()->toDateString();
            $perpage = $updateAll ? 500 : 4;
            $response = $this->getDrawList($lotteryCode, $date, [], 1, $perpage);
            if (!is_null($response)) {
                $this->createOrUpdate($response, $lotteryResult, $lottery, $repo);
                $this->code = $response->getCode();
                $this->msg = $response->getMsg();
            } else {
                $this->code = 0;
                $this->msg = 'API無可處理資料';
            }
        } else {
            $this->code = 0;
            $this->msg = 'DB無可處理資料';
        }
    }

    /**
     * @param string $lotteryCode
     * @param string $date
     * @param array $options
     * @param int $page
     * @param int $perpage
     * @return DrawListResponse|null
     */
    private function getDrawList(
        string $lotteryCode,
        string $date,
        $options = [],
        $page = 1,
        $perpage = 200
    ) {
        $response = $this->client->getDrawList($lotteryCode, $date, $options, $page, $perpage);

        return $response->isErrorOccur() ? null : $response;
    }

    /**
     * @param DrawListResponse $response
     * @param Collection $lotteryResult
     * @param Lottery $lottery
     * @param LotteryResultRepo $repo
     */
    private function createOrUpdate(
        DrawListResponse $response,
        Collection $lotteryResult,
        Lottery $lottery,
        LotteryResultRepo $repo
    ) {
        $now = Carbon::now();
        $response->get(function (DrawDTO $dto) use ($lotteryResult, $lottery, $repo, $now, &$insert) {
            /** @var null|LotteryResult $target */
            $target = $lotteryResult->where('period', $dto->getGid())->first();
            $award = ArrayMaster::explode($dto->getAward());
            if (is_null($target)) {
                $insert[] = [
                    'lottery_id'      => $lottery->getKey(),
                    'period'          => $dto->getGid(),
                    'draw_time'       => $dto->getTime(),
                    'winning_numbers' => $award,
                    'created_at'      => $now->toDateTimeString(),
                    'updated_at'      => $now->toDateTimeString()
                ];
            } else {
                $target->winning_numbers = $award;
                $target->save();
            }
        });
        if (ArrayMaster::isList($insert)) {
            $repo->insert($insert);
        }
    }
}
