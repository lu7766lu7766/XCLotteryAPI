<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/16
 * Time: 上午 10:51
 */

namespace Modules\Lottery\Http\Requests\Manage;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class LotteryUpdateRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @return array
     */
    public function getClassifiedIds()
    {
        return $this->get('classified_ids', []);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->get('name');
    }

    /**
     * @return \Illuminate\Http\UploadedFile|null
     */
    public function getImage()
    {
        return $this->file('image');
    }

    /**
     * @return string
     */
    public function getEnable()
    {
        return $this->get('enable');
    }

    /**
     * @return string
     */
    public function getDelImage()
    {
        return $this->get('del_image');
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
            'id'               => 'required|integer',
            'classified_ids'   => 'required|array',
            'classified_ids.*' => 'integer',
            'name'             => 'sometimes|required|max:20',
            'image'            => 'sometimes|required|image|dimensions:max_width=100,max_height=100',
            'enable'           => 'required|string|' . Rule::in(NYEnumConstants::enum()),
            'del_image'        => 'sometimes|required|' . Rule::in(NYEnumConstants::YES)
        ];
    }
}
