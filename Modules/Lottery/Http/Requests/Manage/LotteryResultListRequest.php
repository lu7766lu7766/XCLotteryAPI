<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/20
 * Time: 上午 10:26
 */

namespace Modules\Lottery\Http\Requests\Manage;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class LotteryResultListRequest extends BaseFormRequest
{
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
    public function getClassifiedId()
    {
        return $this->get('classified_id');
    }

    /**
     * @return int|null
     */
    public function getLotteryId()
    {
        return $this->get('lottery_id');
    }

    /**
     * @return string|null
     */
    public function getEnable()
    {
        return $this->get('enable');
    }

    /**
     * @return string|null
     */
    public function getPeriod()
    {
        return $this->get('period');
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->get('page', 1);
    }

    /**
     * @return int
     */
    public function getPerpage()
    {
        return $this->get('perpage', 20);
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
            'start'         => 'required_with:end|date_format:Y-m-d H:i:s',
            'end'           => 'required_with:start|date_format:Y-m-d H:i:s|after:start',
            'classified_id' => 'sometimes|required|integer',
            'lottery_id'    => 'sometimes|required|integer',
            'enable'        => 'sometimes|required|string|' . Rule::in(NYEnumConstants::enum()),
            'period'        => 'sometimes|required|string',
            'page'          => 'sometimes|required|integer|min:1',
            'perpage'       => 'sometimes|required|integer|between:1,100',
        ];
    }
}
