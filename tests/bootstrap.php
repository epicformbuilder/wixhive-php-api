<?php

$dirRoot = realpath(dirname(__FILE__) . "/..");

require "{$dirRoot}/vendor/autoload.php";
require "{$dirRoot}/tests/epicformbuilder/Unit/Givens.php";

spl_autoload_register(function($className) use ($dirRoot) {
    $classNameComponents = explode("\\", $className);
    $classFileName = array_pop($classNameComponents);
    $classFilePath = implode("/", $classNameComponents);
    $file = "$dirRoot/src/$classFilePath/$classFileName.php";
    if (is_file($file)) {
        require_once $file;
    }
});