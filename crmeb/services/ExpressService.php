<?php
/**
 *
 * @author: xaboy<365615158@qq.com>
 * @day: 2018/01/10
 */

namespace crmeb\services;


use crmeb\services\HttpService;
use crmeb\services\SystemConfigService;

class ExpressService
{
    protected static $api = [
        'query' => 'https://wuliu.market.alicloudapi.com/kdi'
    ];

    public static function query($no, $type = '')
    {
        $appCode = sysConfig('system_express_app_code');
	$appCode ='7e6926c06b2c4087a041699c1c3d8330';
        if (!$appCode) return false;
        $res = HttpService::getRequest(self::$api['query'], compact('no', 'type'), ['Authorization:APPCODE ' . $appCode]);
        $result = json_decode($res, true) ?: false;
        return $result;
    }

}
