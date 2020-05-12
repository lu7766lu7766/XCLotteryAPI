<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/28
 * Time: 上午 09:57
 */

namespace Modules\Advertisement\Http\Requests;

use Modules\Base\Http\Requests\BaseFormRequest;

class ClientListRequestHandle extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getTypeId()
    {
        return $this->get('type_id');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_id' => 'required|integer'
        ];
    }
}
