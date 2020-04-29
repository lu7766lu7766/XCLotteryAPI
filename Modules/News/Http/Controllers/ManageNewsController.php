<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/30
 * Time: 下午 06:34
 */

namespace Modules\News\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\News\Entities\News;
use Modules\News\Http\Requests\Manage\NewsInfoRequest;
use Modules\News\Http\Requests\Manage\NewsListRequest;
use Modules\News\Http\Requests\Manage\NewsUpdateRequest;
use Modules\News\Repositories\NewsClassifiedRepo;
use Modules\News\Service\ManageNewsService;

class ManageNewsController extends Controller
{
    /**
     * @param NewsListRequest $request
     * @return Collection|News[]
     */
    public function list(NewsListRequest $request)
    {
        return app(ManageNewsService::class)->list($request);
    }

    /**
     * @param NewsListRequest $request
     * @return int
     */
    public function total(NewsListRequest $request)
    {
        return app(ManageNewsService::class)->total($request);
    }

    /**
     * @param NewsInfoRequest $request
     * @return News
     * @throws ApiErrorCodeException
     */
    public function fullText(NewsInfoRequest $request)
    {
        return app(ManageNewsService::class)->fullText($request->getId());
    }

    /**
     * @param NewsUpdateRequest $request
     * @return News
     * @throws ApiErrorCodeException
     */
    public function update(NewsUpdateRequest $request)
    {
        return app(ManageNewsService::class)->update($request);
    }

    /**
     * @param NewsInfoRequest $request
     * @return News
     * @throws ApiErrorCodeException
     */
    public function del(NewsInfoRequest $request)
    {
        return app(ManageNewsService::class)->del($request->getId());
    }

    /**
     * @return array
     */
    public function options()
    {
        return [
            'classified' => app(NewsClassifiedRepo::class)->all(),
            'enable'     => NYEnumConstants::enum()
        ];
    }
}
