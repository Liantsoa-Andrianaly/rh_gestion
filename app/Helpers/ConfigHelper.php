<?php


namespace App\Helpers;

class ConfigHelper{
    public static  function getAppName(){
        $appName = Configuration::where('type', 'APP_NAME')->value('value');
        return $appName;
    }
}