<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/25
 * Time: 下午 04:12
 */

namespace Modules\Advertisement\Services;

use Modules\Advertisement\Entities\AdvertisementType;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Exception\ApiErrorCodeException;

class ManageTypeService
{
    /**
     * @param string $code
     * @param string $name
     * @param string $status
     * @return AdvertisementType|null
     * @throws ApiErrorCodeException
     */
    public function create(
        string $code,
        string $name,
        string $status = NYEnumConstants::YES
    ) {
        $type = new AdvertisementType();
        $attributes = [
            'code'   => $code,
            'name'   => $name,
            'status' => $status
        ];
        try {
            $result = $type->create($attributes);
        } catch (\Throwable $e) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::CREATE_FAIL, 'create fail');
        }

        return $result;
    }
}
