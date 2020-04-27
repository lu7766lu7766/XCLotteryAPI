<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/31
 * Time: 下午 06:33
 */

namespace Modules\Announcement\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class ListRequestHandle extends BaseFormRequest
{
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'      => 'sometimes|required|string',
            'is_marquee' => 'sometimes|required|' . Rule::in(NYEnumConstants::enum()),
            'is_top'     => 'sometimes|required|' . Rule::in(NYEnumConstants::enum()),
            'status'     => 'sometimes|required|' . Rule::in(NYEnumConstants::enum()),
            'page'       => 'sometimes|required|integer|min:1',
            'perpage'    => 'sometimes|required|integer|between:1,100',
        ];
    }
}
