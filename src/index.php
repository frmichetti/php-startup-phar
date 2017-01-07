<?
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 05/01/17
 * Time: 15:49
 */
require_once "phar://myapp.phar/common.php";

$config = parse_ini_file("config.ini");

AppManager::run($config);