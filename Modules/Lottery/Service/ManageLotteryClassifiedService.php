<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/8
 * Time: 下午 04:36
 */

namespace Modules\Lottery\Service;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Lottery\Entities\LotteryClassified;
use Modules\Lottery\Http\Requests\Manage\LotteryClassifiedCreateRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryClassifiedListRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryClassifiedUpdateRequest;
use Modules\Lottery\Repositories\LotteryClassifiedRepo;

class ManageLotteryClassifiedService
{
    /**
     * @var LotteryClassifiedRepo|null
     */
    private $repo;

    public function __construct()
    {
        $this->repo = new LotteryClassifiedRepo();
    }

    /**
     * @param LotteryClassifiedListRequest $request
     * @return Collection|LotteryClassified[]
     */
    public function list(LotteryClassifiedListRequest $request)
    {
        return $this->repo->list(
            $request->getName(),
            $request->getEnable(),
            $request->getPage(),
            $request->getPerpage()
        );
    }

    /**
     * @param LotteryClassifiedListRequest $request
     * @return int
     */
    public function total(LotteryClassifiedListRequest $request)
    {
        return $this->repo->total($request->getName(), $request->getEnable());
    }

    /**
     * @param int $id
     * @return LotteryClassified
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
     * @param LotteryClassifiedCreateRequest $request
     * @return LotteryClassified
     * @throws ApiErrorCodeException
     */
    public function create(LotteryClassifiedCreateRequest $request)
    {
        $orm = new LotteryClassified();
        $orm->fill([
            'name'   => $request->getName(),
            'enable' => $request->getEnable()
        ]);
        $result = $this->repo->saveData($orm);
        if (!$result) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::CREATE_FAIL);
        }

        return $orm;
    }

    /**
     * @param LotteryClassifiedUpdateRequest $request
     * @return LotteryClassified
     * @throws ApiErrorCodeException
     */
    public function update(LotteryClassifiedUpdateRequest $request)
    {
        $orm = $this->info($request->getId());
        $orm->fill([
            'name'   => $request->getName(),
            'enable' => $request->getEnable()
        ]);
        $result = $this->repo->saveData($orm);
        if (!$result) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $orm;
    }

    /**
     * @param int $id
     * @return LotteryClassified
     * @throws ApiErrorCodeException
     */
    public function del(int $id)
    {
        $orm = $this->info($id);
        $result = $this->repo->del($orm);
        if (!$result) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $orm;
    }
}
