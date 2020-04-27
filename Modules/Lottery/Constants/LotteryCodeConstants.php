<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/15
 * Time: 下午 05:06
 */

namespace Modules\Lottery\Constants;

use Caipiao\Constants\GameKeyConstants;

class LotteryCodeConstants extends GameKeyConstants
{
    /**
     * @return array
     */
    public static function mapping()
    {
        return [
            self::BEIJING_RACING      => '北京赛车',
            self::CHONGQING_SSC       => '重庆时时彩',
            self::HEILONGJIANG_SSC    => '黑龙江时时彩',
            self::INNER_MONGOLIA_SSC  => '内蒙古时时彩',
            self::TIANJIN_SSC         => '天津时时彩',
            self::XINJIANG_SSC        => '新疆时时彩',
            self::YUNNAN_SSC          => '云南时时彩',
            self::JIANGXI_SYXW        => '江西11选5',
            self::SHANDONG_SYXW       => '山东11选5',
            self::GUANGDONG_SYXW      => '广东11选5',
            self::ANHUI_SYXW          => '安徽11选5',
            self::BEIJING__SYXW       => '北京11选5',
            self::FUJIAN_SYXW         => '福建11选5',
            self::GANSU_SYXW          => '甘肃11选5',
            self::GUANGXI_SYXW        => '广西11选5',
            self::GUIZHOU_SYXW        => '贵州11选5',
            self::HEBEI_SYXW          => '河北11选5',
            self::HEILONGJIANG_SYXW   => '黑龙江11选5',
            self::HUBEI_SYXW          => '湖北11选5',
            self::JILIN_SYXW          => '吉林11选5',
            self::JIANGSU_SYXW        => '江苏11选5',
            self::LIAONING_SYXW       => '辽宁11选5',
            self::INNER_MONGOLIA_SYXW => '内蒙古11选5',
            self::NINGXIA_SYXW        => '宁夏11选5',
            self::SHANGHAI_SYXW       => '上海11选5',
            self::SHANXI_SYXW         => '山西11选5',
            self::SHAANXI_SYXW        => '陕西11选5',
            self::TIANJIN_SYXW        => '天津11选5',
            self::XINJIANG_SYXW       => '新疆11选5',
            self::ZHEJIANG_SYXW       => '浙江11选5',
            self::YUNNAN_SYXW         => '云南11选5',
            self::JIANGSU_K3          => '江苏快3',
            self::ANHUI_K3            => '安徽快3',
            self::GUANGXI_K3          => '广西快3',
            self::JILIN_K3            => '吉林快3',
            self::FUJIAN_K3           => '福建快3',
            self::BEIJING_K3          => '北京快3',
            self::SHANGHAI_K3         => '上海快3',
            self::HEBEI_K3            => '河北快3',
            self::JIANGXI_K3          => '江西快3',
            self::GANSU_K3            => '甘肃快3',
            self::GUIZHOU_K3          => '贵州快3',
            self::HENAN_K3            => '河南快3',
            self::HUBEI_K3            => '湖北快3',
            self::INNER_MONGOLIA_K3   => '内蒙古快3',
            self::QINGHAI_K3          => '青海快3',
            self::SHANGHAI_SSL        => '上海时时乐',
            self::GUANGDONG_KL10      => '广东快乐十分',
            self::TIANJIN_KL10        => '天津快乐十分',
            self::BEIJING_KL8         => '北京快乐8',
            self::HUNAN_KL10          => '湖南快乐十分',
            self::CHONGQING_KL10      => '重庆快乐十分',
            self::GUANGXI_KL10        => '广西快乐十分',
            self::SHANXI_KL10         => '山西快乐十分',
            self::YUNNAN_KL10         => '云南快乐十分',
            self::HEILONGJIANG_KL10   => '黑龙江快乐十分',
            self::SHAANXI_KL10        => '陕西快乐十分',
            self::SHUANG_SE_QIU       => '双色球',
            self::FU_CAI_3D           => '福彩3D',
            self::QI_LE_CAI           => '七乐彩',
            self::LIU_HE_CAI          => '六合彩'
        ];
    }
}
