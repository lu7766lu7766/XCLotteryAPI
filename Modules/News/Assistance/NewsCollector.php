<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/31
 * Time: 上午 11:11
 */

namespace Modules\News\Assistance;

use Carbon\Carbon;
use Modules\News\Entities\NewsClassified;
use Modules\News\Repositories\NewsClassifiedRepo;
use Modules\News\Repositories\NewsRepo;
use Skywalk\Client;
use Skywalk\Response\News\DTO\UserMakeNewsDTO;

class NewsCollector
{
    /** @var Client $client */
    private $client;
    /** @var int $code */
    private $code;
    /** @var string $msg */
    private $msg;

    /**
     * NewsCollector constructor.
     */
    public function __construct()
    {
        $this->client = new Client(config('News.config.skywalk_key'));
    }

    /**
     * 取得新聞
     * @throws \Exception
     */
    public function run()
    {
        $newClassified = app(NewsClassifiedRepo::class)->all();
        $dateTime = Carbon::today()->toDateTimeString();
        $news = $newClassified->map(function (NewsClassified $classified) use ($dateTime) {
            $latestNews = app(NewsRepo::class)->getLatestNewsByWebPageIdWithTrashed($classified->getKey());
            $latestPostTime = $latestNews->post_time ?? $dateTime;
            $result = $this->eachMatchNews($classified->getKey(), $latestPostTime);

            return $result;
        })
            ->collapse()
            ->all();
        app(NewsRepo::class)->add($news);
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * 遍歷符合的新聞
     * @param int $classifiedId
     * @param string $latestPostTime
     * @param int $page
     * @param int $perpage
     * @param array $recurseResult
     * @return array
     */
    public function eachMatchNews(
        int $classifiedId,
        string $latestPostTime,
        int $page = 1,
        int $perpage = 50,
        array $recurseResult = []
    ) {
        $result = [];
        $response = $this->client->getUserMakeNews($classifiedId, $page, $perpage);
        if (!$response->isErrorOccur()) {
            $isNextPage = true;
            $news = $response->get(function (UserMakeNewsDTO $news) use ($classifiedId, $latestPostTime, &$isNextPage) {
                $result = [];
                if ($news->getPostTime() > $latestPostTime) {
                    $result = $news->all();
                    $result['classified_id'] = $classifiedId;
                } else {
                    $isNextPage = false;
                }

                return $result;
            });
            $result = array_merge($recurseResult, array_filter($news));
            if ($isNextPage) {
                $result = $this->eachMatchNews($classifiedId, $latestPostTime, $page + 1, $perpage, $result);
            }
        }
        $this->code = $response->getCode();
        $this->msg = $response->getMsg();

        return $result;
    }
}
