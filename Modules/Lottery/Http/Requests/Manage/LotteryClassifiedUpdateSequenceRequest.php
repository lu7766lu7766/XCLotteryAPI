<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/4
 * Time: 下午 02:55
 */

namespace Modules\Lottery\Http\Requests\Manage;

use Modules\Base\Http\Requests\BaseFormRequest;

class LotteryClassifiedUpdateSequenceRequest extends BaseFormRequest
{
    /**
     * @return array
     */
    public function getSequence()
    {
        return $this->get('sequence');
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
            'sequence'   => 'required|array',
            'sequence.*' => 'integer'
        ];
    }
}
