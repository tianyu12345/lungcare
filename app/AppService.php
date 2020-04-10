<?php

namespace app;

use crmeb\services\SystemConfigService;
use crmeb\utils\Json;
use think\facade\Db;
use think\Service;

class AppService extends Service
{

    public $bind = [
        'json' => Json::class,
        'sysConfig' => SystemConfigService::class
    ];

    public function boot()
    {

    }
}
