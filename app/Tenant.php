<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use SoftDeletes;

    /**
     *
     */
    public function info()
    {
        return $this->hasOne('App\TenantInfo');
    }

    /**
     *
     */
    public static function getWeChatAppId()
    {
        $Tenant = $GLOBALS['Tenant'];
        if ($Tenant->enable_wechat_pa) {
            return $Tenant->info->wx_app_id;
        } else {
            return env('WECHAT_APPID');
        }
    }

    /**
     *
     */
    public static function getWeChatAppSecret()
    {
        $Tenant = $GLOBALS['Tenant'];
        if ($Tenant->enable_wechat_pa) {
            return $Tenant->info->wx_app_secret;
        } else {
            return env('WECHAT_SECRET');
        }
    }

    /**
     *
     */
    public static function getWechatTempNoticeId()
    {
        $Tenant = $GLOBALS['Tenant'];
        if ($Tenant->enable_wechat_pa && $Tenant->info->wx_temp_notice_id) {
            return $Tenant->info->wx_temp_notice_id;
        } else {
            return env('WECHAT_TEMP_NOTICE_ID');
        }
    }
}