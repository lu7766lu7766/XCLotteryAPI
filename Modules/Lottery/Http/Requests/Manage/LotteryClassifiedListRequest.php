<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/8
 * Time: 下午 04:28
 */

namespace Modules\Lottery\Http\Requests\Manage;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class LotteryClassifiedListRequest extends BaseFormRequest
{
    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->get('name');
    }

    /**
     * @return string|null
     */
    public function getEnable()
    {
        return $this->get('enable');
    }

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->get('page', 1);
    }

    /**
     * @return int|null
     */
    public function getPerpage(): ?int
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
            'name'    => 'sometimes|required|max:30',
            'enable'  => 'sometimes|required|string|' . Rule::in(NYEnumConstants::enum()),
            'page'    => 'sometimes|required|integer|min:1',
            'perpage' => 'sometimes|required|integer|between:1,100'
        ];
    }
}
