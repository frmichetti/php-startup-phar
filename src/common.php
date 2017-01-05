<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 05/01/17
 * Time: 15:50
 */
class AppManager
{
    public static function run($config) {
        echo "Application is now running with the following configuration... ";
        var_dump($config);
    }
}