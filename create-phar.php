<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 05/01/17
 * Time: 15:51
 */
$srcRoot = __DIR__ . "/src";

$buildRoot = __DIR__ . "/build";

$phar = new Phar($buildRoot . "/myapp.phar",
    FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME, "myapp.phar");

$phar["index.php"] = file_get_contents($srcRoot . "/index.php");

$phar["common.php"] = file_get_contents($srcRoot . "/common.php");

$phar->setStub($phar->createDefaultStub("index.php"));

copy($srcRoot . "/config.ini", $buildRoot . "/config.ini");