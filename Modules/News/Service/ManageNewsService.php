<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/30
 * Time: 下午 06:48
 */

namespace Modules\News\Service;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\News\Assistance\NewsFullTextCollector;
use Modules\News\Entities\News;
use Modules\News\Http\Requests\Manage\NewsListRequest;
use Modules\News\Http\Requests\Manage\NewsUpdateRequest;
use Modules\News\Repositories\NewsRepo;

class ManageNewsService
{
    private $repo;

    public function __construct()
    {
        $this->repo = new NewsRepo();
    }

    /**
     * @param NewsListRequest $request
     * @return Collection|News[]
     */
    public function list(NewsListRequest $request)
    {
        return $this->repo->list(
            $request->getTitle(),
            $request->getStart(),
            $request->getEnd(),
            $request->getClassifiedId(),
            $request->getEnable(),
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
        return $this->repo->total(
            $request->getTitle(),
            $request->getStart(),
            $request->getEnd(),
            $request->getClassifiedId(),
            $request->getEnable()
        );
    }

    /**
     * @param int $id
     * @return News
     * @throws ApiErrorCodeException
     */
    public function fullText(int $id)
    {
        $news = $this->findNews($id);
        if (!is_null($news) && is_null($news->fullText)) {
            $fulltext = app(NewsFullTextCollector::class)->getFulltext($news);
            $news->setRelation('full_text', $fulltext);
        }

        return $news;
    }

    /**
     * @param NewsUpdateRequest $request
     * @return News
     * @throws ApiErrorCodeException
     */
    public function update(NewsUpdateRequest $request)
    {
        $news = $this->findNews($request->getId());
        $result = $this->repo->updateEnable($news, $request->getEnable());
        if (!$result) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $news;
    }

    /**
     * @param int $id
     * @return News
     * @throws ApiErrorCodeException
     */
    public function del(int $id)
    {
        $news = $this->findNews($id);
        $result = $this->repo->del($news);
        if (!$result) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $news;
    }

    /**
     * @param int $id
     * @return News
     * @throws ApiErrorCodeException
     */
    private function findNews(int $id)
    {
        $news = $this->repo->findById($id);
        if (is_null($news)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND);
        }

        return $news;
    }
}
