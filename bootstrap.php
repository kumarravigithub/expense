<?php

require_once __DIR__ . '/code/fw/Pop/Loader/Autoloader.php';

$autoloader = new \Pop\Loader\Autoloader();
$autoloader->splAutoloadRegister();


class Message {
    public static $errorCode;

    public static function NoInput($msg='') {
        echo 'FALSE~ERR~No Parameter Provided.' . $msg;
        self::$errorCode=1;
    }
    
    public static function Success($data='') {
        echo 'TRUE' . $data;
        self::$errorCode=1;
    }
}