<?php

namespace App\Services;

/**
 * Class BaseService.
 */
class BaseService
{
    public static function errorExceptions($e){
        $message = $e->getMessage();
        var_dump('Exception Message: '. $message);
        $code = $e->getCode();
        var_dump('Exception Code: '. $code);
        $string = $e->__toString();
        var_dump('Exception String: '. $string);
        exit;
    }
}
