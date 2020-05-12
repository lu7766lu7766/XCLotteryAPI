<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/5
 * Time: 下午 06:22
 */

namespace Modules\News\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\News\Entities\NewsClassified;
use Modules\News\Service\ClientNewsClassifiedService;

class ClientNewsClassifiedController extends Controller
{
    /**
     * @return Collection|NewsClassified[]
     */
    public function all()
    {
        return app(ClientNewsClassifiedService::class)->all();
    }
}
