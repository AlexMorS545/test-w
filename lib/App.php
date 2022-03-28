<?php

class App {
    public static function init() {
        date_default_timezone_set('Europe/Moscow');
        DB::getInstance()->connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'));

        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {
            self::web($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        }
    }

    protected static function web($url)
    {
        $url = explode("/", $url);
        $method_name = '';

        if (!empty($_POST)) {
            $controller_name = ucfirst($url[1]) . 'Controller';
            $controller = new $controller_name();
            $method_name = $url[2];
            if (isset($url[3])) {
                if (is_numeric($url[3])) {
                    $id = $url[3];
                    $controller->$method_name($id);
                }
            }
            $controller->$method_name();
        }

        $controller = new PageController();

        if (!empty($url[2])) {
            if (is_numeric($url[2])) {
                $id = $url[2];
                $controller::$view = $method_name;
                $controller->$method_name($id);
            } else {
                $method_name = $url[2];
                $controller::$view = $method_name;
                $controller->$method_name();
            }
        }
        if (!empty($url[1])) {
            if (!empty($_GET)) {
                $url_query = parse_url($url[1]);
                $method_name = $url_query['path'];
                $controller::$view = $method_name;
                $controller->$method_name();

            } else {
                $method_name = $url[1];
                $controller::$view = $method_name;
                $controller->$method_name();
            }
        } else {
            $controller->index();
        }
    }
}
