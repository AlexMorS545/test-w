<?php

class Order
{
    public static function emailsMoreOne()
    {
        return $data = DB::getInstance()->select('SELECT email FROM users GROUP BY email HAVING count(email) > 1', []);
    }

    public static function notOrders()
    {
        return $data = DB::getInstance()->select(
        'SELECT orders.*, users.* FROM users LEFT JOIN orders ON users.id=orders.user_id',
            []
        );
    }

    public static function moreTwoOrders()
    {
        return $data = DB::getInstance()->select(
        'SELECT orders.user_id, users.*, count(orders.user_id) as total_users FROM users RIGHT JOIN orders ON users.id=orders.user_id GROUP BY orders.user_id HAVING total_users > 1',
            []
        );
    }
}
