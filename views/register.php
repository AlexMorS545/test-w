<!doctype html>
<html lang="en">
<head>
    <?php include '../views/layouts/head.php';?>
</head>
<body>
<?php include '../views/layouts/header.php'; ?>
<div class="container">
    <h1><?= $title?></h1>
    <form class="w-75 mx-auto" action="/user/create" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Регистрация</button>
    </form>
</div>
</body>
</html>
