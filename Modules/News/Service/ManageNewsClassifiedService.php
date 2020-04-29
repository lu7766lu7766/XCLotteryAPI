<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 05:07
 */

namespace Modules\News\Service;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\News\Entities\NewsClassified;
use Modules\News\Repositories\NewsClassifiedRepo;

class ManageNewsClassifiedService
{
    /** @var NewsClassifiedRepo|null */
    private $repo;

    /**
     * ManageNewsClassifiedService constructor.
     */
    public function __construct()
    {
        $this->repo = new NewsClassifiedRepo();
    }

    /**
     * @param string|null $name
     * @param string|null $enable
     * @return NewsClassified[]|Collection
     */
    public function list(string $name = null, string $enable = null)
    {
        return $this->repo->list($name, $enable);
    }

    /**
     * @param int $id
     * @return NewsClassified
     * @throws ApiErrorCodeException
     */
    public function info(int $id)
    {
        $orm = $this->repo->findById($id);
        if (is_null($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND);
        }

        return $orm;
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $enable
     * @return NewsClassified|null
     * @throws ApiErrorCodeException
     */
    public function update(int $id, string $name, string $enable)
    {
        $orm = $this->info($id);
        $attributes = [
            'name'   => $name,
            'enable' => $enable
        ];
        if (!$this->repo->update($orm, $attributes)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $orm;
    }
}
