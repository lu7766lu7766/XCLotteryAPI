<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/29
 * Time: 下午 03:19
 */

namespace Modules\News\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Lottery\Entities\LotteryClassified;
use Modules\News\Entities\News;
use Modules\News\Http\Requests\Client\NewsInfoRequest;
use Modules\News\Http\Requests\Client\NewsLatestRequest;
use Modules\News\Http\Requests\Client\NewsListRequest;
use Modules\News\Service\ClientNewsService;

class ClientNewsController extends Controller
{
    /** @var ClientNewsService */
    private $service;

    public function __construct()
    {
        $this->service = new ClientNewsService();
    }

    /**
     * @param NewsListRequest $request
     * @return LotteryClassified|null
     */
    public function list(NewsListRequest $request)
    {
        return $this->service->list($request);
    }

    /**
     * @param NewsListRequest $request
     * @return int
     */
    public function total(NewsListRequest $request)
    {
        return $this->service->total($request);
    }

    /**
     * @param NewsInfoRequest $request
     * @return News|null
     */
    public function fullText(NewsInfoRequest $request)
    {
        return $this->service->fullText($request->getId());
    }

    /**
     * @param NewsLatestRequest $request
     * @return Collection|News[]
     */
    public function latest(NewsLatestRequest $request)
    {
        return $this->service->latest($request->getLimit());
    }
}
