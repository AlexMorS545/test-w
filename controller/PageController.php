<?php

class PageController extends Controller
{
    public static $view;

    public function index()
    {
        $title = 'Главная';
        $emails_more_one = Order::emailsMoreOne();
        $not_orders = Order::notOrders();
        $more_two_orders = Order::moreTwoOrders();
        include('../views/home.php');
    }

    public function profile()
    {
        $title = 'Профиль';
        include('../views/'. self::$view . '.php');
    }

    public function register()
    {
        $title = 'Регистрация';
        include('../views/'. self::$view . '.php');
    }

    public function login()
    {
        $title = 'Вход';
        include('../views/'. self::$view . '.php');
    }

    public function logout()
    {
        $message = User::logout();
        header('Location: /');
    }
}
