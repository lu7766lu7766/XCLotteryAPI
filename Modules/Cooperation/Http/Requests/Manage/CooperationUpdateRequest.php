<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/1
 * Time: 下午 04:14
 */

namespace Modules\Cooperation\Http\Requests\Manage;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class CooperationUpdateRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->get('title');
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
    public function getIsBlank()
    {
        return $this->get('is_blank', NYEnumConstants::NO);
    }

    /**
     * @return null|string
     */
    public function getLink()
    {
        return $this->get('link');
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
            'id'        => 'required|integer',
            'title'     => 'required|max:30',
            'image'     => 'sometimes|required|image|dimensions:max_width=370,max_height=165',
            'is_blank'  => 'sometimes|required|' . Rule::in(NYEnumConstants::enum()),
            'link'      => 'sometimes|nullable|url|max:255',
            'enable'    => 'required|' . Rule::in(NYEnumConstants::enum()),
            'del_image' => 'sometimes|required|' . Rule::in(NYEnumConstants::YES)
        ];
    }
}
