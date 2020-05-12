<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/29
 * Time: 上午 10:54
 */

namespace Modules\Lottery\Http\Requests\Client;

use Modules\Base\Http\Requests\BaseFormRequest;

class LotteryResultListByClassifiedRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getClassifiedId()
    {
        return $this->get('classified_id');
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
            'classified_id' => 'required|integer'
        ];
    }
}
