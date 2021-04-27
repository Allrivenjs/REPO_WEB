<?php

namespace app;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Twig\Error\LoaderError;

class log {
    private static $_logger = null;

    private static function getLogger(){
            if(!self::$_logger){
                self::$_logger = new Logger('app log');
            }
            return self::$_logger;
    }

    public static function logErrors($error){
        self::getLogger()->pushHandler(new StreamHandler('../logs/application.log', Logger::ERROR));
        self::getLogger()->error($error);
    }
    public static function logInfo($info){
        self::getLogger()->pushHandler(new StreamHandler('../logs/application.log', Logger::INFO));
        self::getLogger()->info($info);
    }
}