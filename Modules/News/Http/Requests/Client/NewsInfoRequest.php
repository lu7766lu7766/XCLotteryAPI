<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/29
 * Time: 下午 03:22
 */

namespace Modules\News\Http\Requests\Client;

use Modules\Base\Http\Requests\BaseFormRequest;

class NewsInfoRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
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
            'id' => 'required|integer'
        ];
    }
}
