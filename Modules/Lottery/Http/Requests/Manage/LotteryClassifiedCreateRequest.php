<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/8
 * Time: 下午 04:31
 */

namespace Modules\Lottery\Http\Requests\Manage;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class LotteryClassifiedCreateRequest extends BaseFormRequest
{
    /**
     * @return string
     */
    public function getName()
    {
        return $this->get('name');
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
            'name'   => 'required|max:30|unique:lottery_classified,name',
            'enable' => 'required|string|' . Rule::in(NYEnumConstants::enum())
        ];
    }
}
