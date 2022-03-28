<?php

class Config
{
    private static $parameters = [
        'db_user' => 'root',
        'db_password' => 'root',
        'db_base' => 'test_work5',
        'db_host' => 'localhost',
        'db_charset' => 'UTF-8',
        'site_url' => 'test-work5.loc',
    ];

    public static function get($param)
    {
        return self::$parameters[$param];
    }

}
