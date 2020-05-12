<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/29
 * Time: 下午 03:22
 */

namespace Modules\News\Http\Requests\Client;

use Modules\Base\Http\Requests\BaseFormRequest;

class NewsListRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getClassifiedId()
    {
        return $this->get('classified_id');
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
            'classified_id' => 'required|integer',
            'page'          => 'sometimes|required|integer|min:1',
            'perpage'       => 'sometimes|required|integer|between:1,100'
        ];
    }
}
