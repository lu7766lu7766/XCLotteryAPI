<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/31
 * Time: 下午 05:30
 */

namespace Modules\Announcement\Http\Requests;

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
     * @return string
     */
    public function getTitle()
    {
        return $this->get('title');
    }

    /**
     * @return UploadedFile|null
     */
    public function getCover()
    {
        return $this->file('cover');
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->get('contents');
    }

    /**
     * @return string
     */
    public function getIsMarquee()
    {
        return $this->get('is_marquee');
    }

    /**
     * @return string
     */
    public function getIsTop()
    {
        return $this->get('is_top');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->get('status');
    }

    /**
     * @return array
     */
    public function getEditorImageIds()
    {
        return $this->get('editor_image_ids', []);
    }

    /**
     * @return boolean
     */
    public function getRemoveCover()
    {
        return $this->get('remove_cover');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'                 => 'required|integer',
            'title'              => 'required|string|max:50',
            'cover'              => 'sometimes|required|image|dimensions:max_width=263,max_height=300',
            'contents'           => 'required|string',
            'is_marquee'         => 'required|' . Rule::in(NYEnumConstants::enum()),
            'is_top'             => 'required|' . Rule::in(NYEnumConstants::enum()),
            'status'             => 'required|' . Rule::in(NYEnumConstants::enum()),
            'editor_image_ids'   => 'sometimes|required|array',
            'editor_image_ids.*' => 'integer',
            'remove_cover'       => 'sometimes|required|boolean',
        ];
    }
}
