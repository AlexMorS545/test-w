<?php

class UserController extends Controller
{
    public function create()
    {
        $message = User::newUser($_POST['name'], $_POST['login'], $_POST['email'], $_POST['password']);

        header('Location: /profile?message=' . $message);
    }

    public function login()
    {
        $message = User::login($_POST['email'], $_POST['password']);

        header('Location: /profile?message=' . $message);
    }

    public function edit($id)
    {
        $message = User::update($id, $_POST['name'], $_POST['login'], $_POST['email'], $_POST['password']);

        header('Location: /profile?message=' . $message);
    }
}
