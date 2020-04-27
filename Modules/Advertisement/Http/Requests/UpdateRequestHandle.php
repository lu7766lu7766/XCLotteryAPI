<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/26
 * Time: 上午 11:51
 */

namespace Modules\Advertisement\Http\Requests;

use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class UpdateRequestHandle extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @return int
     */
    public function getTypeId()
    {
        return $this->get('type_id');
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->get('title');
    }

    /**
     * @return UploadedFile|null
     */
    public function getImage()
    {
        return $this->file('image');
    }

    /**
     * @return string
     */
    public function isBlank()
    {
        return $this->get('is_blank');
    }

    /**
     * @return string|null
     */
    public function getUrl()
    {
        return $this->get('url');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->get('status');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'       => 'required|integer',
            'type_id'  => 'required|integer',
            'title'    => 'required|string|max:50',
            'image'    => 'sometimes|required|image|dimensions:max_width=1170,max_height=325',
            'url'      => 'sometimes|nullable|url',
            'is_blank' => 'required|' . Rule::in(NYEnumConstants::enum()),
            'status'   => 'required|' . Rule::in(NYEnumConstants::enum()),
        ];
    }
}
