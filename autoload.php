<?php
spl_autoload_register("gbStandardAutoload");

function gbStandardAutoload($className)
{
    $dirs = [
        'controller',
        'lib',
        'model',
        'configuration',
        'views',
    ];
    $found = false;
    foreach ($dirs as $dir) {
        $fileName = __DIR__ . '/' . $dir . '/' . $className . '.php';
        if (is_file($fileName)) {

            require_once($fileName);
            $found = true;
        }
    }

    if (!$found) {
        throw new Exception('Unable to load ' . $className);
}
    return true;
}
