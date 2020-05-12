<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/5
 * Time: 下午 06:25
 */

namespace Modules\News\Http\Requests\Client;

use Modules\Base\Http\Requests\BaseFormRequest;

class NewsLatestRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->get('limit', 5);
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
            'limit' => 'sometimes|required|integer|between:1,100'
        ];
    }
}
