<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/20
 * Time: 上午 10:40
 */

namespace Modules\Lottery\Service;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Lottery\Entities\LotteryResult;
use Modules\Lottery\Http\Requests\Manage\LotteryResultListRequest;
use Modules\Lottery\Http\Requests\Manage\LotteryResultUpdateRequest;
use Modules\Lottery\Repositories\LotteryResultRepo;

class ManageLotteryResultService
{
    /** @var LotteryResultRepo */
    private $lotteryResultRepo;

    /**
     * ManageLotteryResultService constructor.
     */
    public function __construct()
    {
        $this->lotteryResultRepo = new LotteryResultRepo();
    }

    /**
     * @param LotteryResultListRequest $request
     * @return Collection|LotteryResult[]
     */
    public function list(LotteryResultListRequest $request)
    {
        return $this->lotteryResultRepo->list(
            $request->getStart(),
            $request->getEnd(),
            $request->getClassifiedId(),
            $request->getLotteryId(),
            $request->getEnable(),
            $request->getPeriod(),
            $request->getPage(),
            $request->getPerpage()
        )->load(['game', 'game.classified']);
    }

    /**
     * @param LotteryResultListRequest $request
     * @return int
     */
    public function total(LotteryResultListRequest $request)
    {
        return $this->lotteryResultRepo->total(
            $request->getStart(),
            $request->getEnd(),
            $request->getClassifiedId(),
            $request->getLotteryId(),
            $request->getEnable(),
            $request->getPeriod()
        );
    }

    /**
     * @param int $id
     * @return LotteryResult|null
     * @throws ApiErrorCodeException
     */
    public function info(int $id)
    {
        $orm = $this->lotteryResultRepo->findById($id);
        if (is_null($orm)) {
            throw  new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND);
        }

        return $orm->load(['game', 'game.classified']);
    }

    /**
     * @param LotteryResultUpdateRequest $request
     * @return LotteryResult
     * @throws ApiErrorCodeException
     */
    public function update(LotteryResultUpdateRequest $request)
    {
        $orm = $this->lotteryResultRepo->findById($request->getId());
        if (is_null($orm)) {
            throw  new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND);
        }
        $orm->fill([
            'winning_numbers' => $request->getWinningNumbers(),
            'enable'          => $request->getEnable()
        ]);
        if (!$this->lotteryResultRepo->saveData($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $orm->load(['game', 'game.classified']);
    }

    /**
     * @param int $id
     * @return LotteryResult
     * @throws ApiErrorCodeException
     */
    public function del(int $id)
    {
        $orm = $this->lotteryResultRepo->findById($id);
        if (is_null($orm)) {
            throw  new ApiErrorCodeException(OOOO1CommonCodes::MODEL_NOT_FOUND);
        }
        if (!$this->lotteryResultRepo->del($orm)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $orm;
    }
}
