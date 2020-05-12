<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/4
 * Time: 上午 10:30
 */

namespace Modules\Lottery\Http\Requests\Manage;

use Modules\Base\Http\Requests\BaseFormRequest;

class LotteryUpdateRuleRequest extends BaseFormRequest
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
    public function getRule()
    {
        return $this->get('rule');
    }

    /**
     * @return array
     */
    public function getEditorImageIds()
    {
        return $this->get('editor_image_ids', []);
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
            'id'                 => 'required|integer',
            'rule'               => 'required|string',
            'editor_image_ids'   => 'sometimes|required|array',
            'editor_image_ids.*' => 'integer',
        ];
    }
}
