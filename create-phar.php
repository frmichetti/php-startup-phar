<?php
function recurse_copy($src,$dst) {

    $dir = opendir($src);

    @mkdir($dst);

    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }

    closedir($dir);
}
?>

<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 05/01/17
 * Time: 15:51
 */
$srcRoot = __DIR__ . "/src";

$buildRoot = __DIR__ . "/build";

$publicRoot = __DIR__ . "/run";

// create with alias "myapp.phar"
$phar = new Phar($buildRoot . "/myapp.phar", FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME, 'myapp.phar');

// add all files in the project
$phar->buildFromDirectory($srcRoot);

$phar->setStub($phar->createDefaultStub('index.php'));

copy($srcRoot . "/config.ini", $buildRoot . "/config.ini");

recurse_copy($buildRoot,$publicRoot);