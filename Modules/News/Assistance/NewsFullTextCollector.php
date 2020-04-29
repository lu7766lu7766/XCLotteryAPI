<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/31
 * Time: 上午 11:11
 */

namespace Modules\News\Assistance;

use Modules\News\Entities\News;
use Skywalk\Client;

class NewsFullTextCollector
{
    /** @var Client $client */
    private $client;
    /** @var string $code */
    private $code;
    /** @var string $msg */
    private $msg;

    /**
     * NewsFullTextCollector constructor.
     */
    public function __construct()
    {
        $this->client = new Client(config('News.config.skywalk_key'));
    }

    /**
     * @return string
     */
    public function getCode(): string
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
     * @param News $news
     * @return News|null
     */
    public function getFullText(News $news)
    {
        $response = $this->client->getNewsFullText($news->url);
        if (!$response->isErrorOccur()) {
            $params = [
                'title'   => $response->getTitle(),
                'content' => $response->getContent()
            ];
            /** @var News $result */
            $result = $news->fullText()->create($params);
        } else {
            $result = null;
            $this->code = $response->getCode();
            $this->msg = $response->getMsg();
        }

        return $result;
    }
}
