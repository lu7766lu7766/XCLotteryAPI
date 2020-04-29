<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 05:29
 */

namespace Modules\News\Http\Requests\Manage;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class NewsClassifiedListRequest extends BaseFormRequest
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
     * Request args validate rules.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write rule.
     * @return array
     * @see https://laravel.com/docs/master/validation#available-validation-rules
     * checkout this to get more rule keyword info
     */
    public function rules()
    {
        return [
            'name'   => 'sometimes|required|max:20',
            'enable' => 'sometimes|required|' . Rule::in(NYEnumConstants::enum())
        ];
    }
}
