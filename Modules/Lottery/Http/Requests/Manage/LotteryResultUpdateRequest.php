<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/20
 * Time: 上午 10:27
 */

namespace Modules\Lottery\Http\Requests\Manage;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class LotteryResultUpdateRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @return array
     */
    public function getWinningNumbers()
    {
        return $this->get('winning_numbers');
    }

    /**
     * @return string
     */
    public function getEnable()
    {
        return $this->get('enable');
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
            'id'                => 'required|integer',
            'winning_numbers'   => 'required|array',
            'winning_numbers.*' => 'numeric',
            'enable'            => 'required|string|' . Rule::in(NYEnumConstants::enum())
        ];
    }
}
