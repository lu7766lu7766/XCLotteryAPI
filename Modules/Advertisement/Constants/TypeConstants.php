<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/25
 * Time: 下午 04:57
 */

namespace Modules\Advertisement\Constants;

use XC\Independent\Kit\Constants\BaseConstants;

class TypeConstants extends BaseConstants
{
    //輪播區塊
    const CAROUSEL = 'carousel';

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::CAROUSEL
        ];
    }

    /**
     * @return array
     */
    public static function list()
    {
        return [
            self::CAROUSEL => '轮播区块'
        ];
    }
}
