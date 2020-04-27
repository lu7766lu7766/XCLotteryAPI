<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/6
 * Time: 下午 04:59
 */

namespace Modules\Copywriting\Http\Requests\Manage;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class CopywritingListRequest extends BaseFormRequest
{
    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->get('title');
    }

    /**
     * @return null|string
     */
    public function getEnable()
    {
        return $this->get('enable');
    }

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->get('page', 1);
    }

    /**
     * @return int|null
     */
    public function getPerpage(): ?int
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
            'title'   => 'sometimes|required|max:50',
            'enable'  => 'sometimes|required|' . Rule::in(NYEnumConstants::enum()),
            'page'    => 'sometimes|required|integer|min:1',
            'perpage' => 'sometimes|required|integer|between:1,100'
        ];
    }
}
