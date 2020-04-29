<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 04:47
 */

namespace Modules\News\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\News\Entities\NewsClassified;
use Modules\News\Http\Requests\Manage\NewsClassifiedInfoRequest;
use Modules\News\Http\Requests\Manage\NewsClassifiedListRequest;
use Modules\News\Http\Requests\Manage\NewsClassifiedUpdateRequest;
use Modules\News\Service\ManageNewsClassifiedService;

class ManageNewsClassifiedController extends Controller
{
    /**
     * @param NewsClassifiedListRequest $request
     * @return NewsClassified[]|Collection
     */
    public function list(NewsClassifiedListRequest $request)
    {
        return app(ManageNewsClassifiedService::class)->list($request->getName(), $request->getEnable());
    }

    /**
     * @param NewsClassifiedInfoRequest $request
     * @return NewsClassified
     * @throws ApiErrorCodeException
     */
    public function info(NewsClassifiedInfoRequest $request)
    {
        return app(ManageNewsClassifiedService::class)->info($request->getId());
    }

    /**
     * @param NewsClassifiedUpdateRequest $request
     * @return NewsClassified|null
     * @throws ApiErrorCodeException
     */
    public function update(NewsClassifiedUpdateRequest $request)
    {
        return app(ManageNewsClassifiedService::class)->update(
            $request->getId(),
            $request->getName(),
            $request->getEnable()
        );
    }

    /**
     * @return array
     */
    public function options()
    {
        return ['enable' => NYEnumConstants::enum()];
    }
}
