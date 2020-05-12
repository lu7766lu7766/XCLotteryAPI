<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/29
 * Time: 上午 09:22
 */

namespace Modules\Lottery\Http\Requests\Client;

use Modules\Base\Http\Requests\BaseFormRequest;

class LotteryResultListRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getLotteryId()
    {
        return $this->get('lottery_id');
    }

    /**
     * @return string|null
     */
    public function getPeriod()
    {
        return $this->get('period');
    }

    /**
     * @return string|null
     */
    public function getStartPeriod()
    {
        return $this->get('start_period');
    }

    /**
     * @return string|null
     */
    public function getEndPeriod()
    {
        return $this->get('end_period');
    }

    /**
     * @return string|null
     */
    public function getStart()
    {
        return $this->get('start');
    }

    /**
     * @return string|null
     */
    public function getEnd()
    {
        return $this->get('end');
    }

    /**
     * @return int|null
     */
    public function getLimit()
    {
        return $this->get('limit');
    }

    /**
     * Request args validate rules.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write rule.
     * @return array
     * @see https://laravel.com/docs/master/validation#available-validation-rules
     * checkout this to get more rule keyword info
     */
    public function rules()
    {
        return [
            'lottery_id'   => 'required|integer',
            'period'       => 'sometimes|numeric',
            'start_period' => 'required_with:end_period|numeric',
            'end_period'   => 'required_with:start_period|numeric',
            'start'        => 'required_with:end|date_format:Y-m-d H:i:s',
            'end'          => 'required_with:start|date_format:Y-m-d H:i:s|after:start',
            'limit'        => 'sometimes|required|integer|between:1,100'
        ];
    }
}
