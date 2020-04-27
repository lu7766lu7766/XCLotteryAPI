<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/6
 * Time: 下午 05:02
 */

namespace Modules\Copywriting\Http\Requests\Manage;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class CopywritingUpdateRequest extends BaseFormRequest
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
    public function getTitle()
    {
        return $this->get('title');
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->get('code');
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->get('content');
    }

    /**
     * @return string
     */
    public function getEnable()
    {
        return $this->get('enable');
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
            'title'              => 'required|max:100',
            'code'               => 'required|max:20',
            'content'            => 'sometimes|string',
            'enable'             => 'required|' . Rule::in(NYEnumConstants::enum()),
            'editor_image_ids'   => 'sometimes|required|array',
            'editor_image_ids.*' => 'integer'
        ];
    }
}
