<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/26
 * Time: 下午 03:06
 */

namespace Modules\Advertisement\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class ListRequestHandle extends BaseFormRequest
{
    /**
     * @return int|null
     */
    public function getTypeId()
    {
        return $this->get('type_id');
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->get('title');
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->get('status');
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_id' => 'sometimes|required|integer',
            'title'   => 'sometimes|required|string',
            'status'  => 'sometimes|required|' . Rule::in(NYEnumConstants::enum()),
            'page'    => 'sometimes|required|integer|min:1',
            'perpage' => 'sometimes|required|integer|between:1,100',
        ];
    }
}
