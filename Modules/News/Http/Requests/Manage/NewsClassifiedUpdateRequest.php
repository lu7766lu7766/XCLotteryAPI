<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 05:20
 */

namespace Modules\News\Http\Requests\Manage;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class NewsClassifiedUpdateRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
    }

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
            'id'     => 'required|integer',
            'name'   => 'required|max:20',
            'enable' => 'required|' . Rule::in(NYEnumConstants::enum())
        ];
    }
}
