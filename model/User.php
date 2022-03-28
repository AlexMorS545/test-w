<?php

class User
{
    private static function setPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    private static function getPassword($hash, $password)
    {
        return password_verify($password, $hash);
    }

    public static function newUser($name, $login, $email, $password)
    {
        $user = DB::getInstance()->select('SELECT * FROM users WHERE email=:email',
            ['email' => $email]);

        if (!$user) {
            $email_user = filter_var($email, FILTER_VALIDATE_EMAIL);
            if ($email_user) {
                $new_user = DB::getInstance()->query(
                    'INSERT INTO users (name, login, email, password) VALUES (:name, :login, :email, :password)',
                    ['name' => $name, 'login' => $login, 'email' => $email_user, 'password' => self::setPassword($password)]
                );
                self::login($email_user, $password);
                return 'Регистрация прошла успешно!';
            }
            return 'Не правильно ввели Email !!!';
        }
        return 'Пользователь с таким email существует!';
    }

    public static function update($id, $name, $login, $email, $password)
    {
        $user = DB::getInstance()->query(
            'UPDATE users SET name=:name, login=:login, email=:email, password=:password WHERE id=:user_id',
            ['name' => $name, 'login' => $login, 'email' => $email, 'password' => self::setPassword($password), 'user_id' => $id]
        );
        return 'Данные успешно обновлены';
    }

    public static function getUser($id)
    {
        if (isset($_SESSION['userId'])) {
            $user = DB::getInstance()->select(
                'SELECT * FROM users WHERE id=:user_id',
                ['user_id' => $id]
            );
            return (isset($user[0]) ? $user[0] : null);
        }
        return [];
    }

    public static function login($email, $password)
    {
        $user = DB::getInstance()->select(
            'SELECT * FROM users WHERE email=:email',
            ['email' => $email]
        );

        if ($user) {
            foreach ($user as $u) {
                if (self::getPassword($u['password'], $password)) {
                    $_SESSION['userId'] = $u['id'];
                    return 'Добро пожаловать - ' . $u['name'].'!';
                }
                return 'Не правильно ввели пароль!';
            }
        }
        return 'Нет такого пользователя!';
    }

    public static function logout() {
        if (isset($_SESSION['userId'])) {
            session_destroy();
            return true;
        }
        return false;
    }
}
