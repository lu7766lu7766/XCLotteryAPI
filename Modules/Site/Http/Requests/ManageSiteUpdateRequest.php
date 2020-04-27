<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/24
 * Time: 下午 06:17
 */

namespace Modules\Site\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class ManageSiteUpdateRequest extends BaseFormRequest
{
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->get('title');
    }

    /**
     * @return \Illuminate\Http\UploadedFile|null
     */
    public function getLogo()
    {
        return $this->file('logo');
    }

    /**
     * @return string
     */
    public function getDelLogo()
    {
        return $this->get('del_logo');
    }

    /**
     * @return string|null
     */
    public function getCopyright()
    {
        return $this->get('copyright');
    }

    /**
     * @return string|null
     */
    public function getIcp()
    {
        return $this->get('icp');
    }

    /**
     * @return array
     */
    public function getContact()
    {
        return $this->get('contact', []);
    }

    /**
     * @return \Illuminate\Http\UploadedFile|null
     */
    public function getIOSQRCode()
    {
        return $this->file('ios_qr_code');
    }

    /**
     * @return string
     */
    public function getDelIOSQRCode()
    {
        return $this->get('del_ios_qr_code');
    }

    /**
     * @return \Illuminate\Http\UploadedFile|null
     */
    public function getAndroidQRCode()
    {
        return $this->file('android_qr_code');
    }

    /**
     * @return string
     */
    public function getDelAndroidQRCode()
    {
        return $this->get('del_android_qr_code');
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
            'title'               => 'required|string|max:50',
            'logo'                => 'sometimes|required|image|dimensions:max_width=260,max_height=260',
            'del_logo'            => 'sometimes|required|' . Rule::in(NYEnumConstants::YES),
            'copyright'           => 'sometimes|max:50',
            'icp'                 => 'sometimes|max:30',
            'contact'             => 'sometimes|array',
            'contact.*'           => 'nullable',
            'ios_qr_code'         => 'sometimes|required|image|dimensions:max_width=150,max_height=150',
            'del_ios_qr_code'     => 'sometimes|required|' . Rule::in(NYEnumConstants::YES),
            'android_qr_code'     => 'sometimes|required|image|dimensions:max_width=150,max_height=150',
            'del_android_qr_code' => 'sometimes|required|' . Rule::in(NYEnumConstants::YES),
        ];
    }
}
