<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/29
 * Time: 下午 03:21
 */

namespace Modules\News\Service;

use Illuminate\Database\Eloquent\Collection;
use Modules\Lottery\Entities\LotteryClassified;
use Modules\News\Assistance\NewsFullTextCollector;
use Modules\News\Entities\News;
use Modules\News\Http\Requests\Client\NewsListRequest;
use Modules\News\Repositories\NewsRepo;

class ClientNewsService
{
    /** @var NewsRepo */
    private $newsRepo;

    public function __construct()
    {
        $this->newsRepo = new NewsRepo();
    }

    /**
     * @param NewsListRequest $request
     * @return LotteryClassified|null
     */
    public function list(NewsListRequest $request)
    {
        return $this->newsRepo->listByClassifiedId(
            $request->getClassifiedId(),
            $request->getPage(),
            $request->getPerpage()
        );
    }

    /**
     * @param NewsListRequest $request
     * @return int
     */
    public function total(NewsListRequest $request)
    {
        return $this->newsRepo->listByClassifiedIdTotal($request->getClassifiedId());
    }

    /**
     * @param int $id
     * @return News|null
     */
    public function fullText(int $id)
    {
        $news = $this->newsRepo->findEnableById($id);
        if (!is_null($news) && is_null($news->load('classified')->fullText)) {
            $fulltext = app(NewsFullTextCollector::class)->getFulltext($news);
            $news->setRelation('full_text', $fulltext);
        }

        return $news;
    }

    /**
     * @param int $limit
     * @return Collection|News[]
     */
    public function latest(int $limit)
    {
        return $this->newsRepo->latest($limit)->load('classified');
    }
}
