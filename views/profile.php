<!doctype html>
<html lang="en">
<head>
    <?php include '../views/layouts/head.php';?>
</head>
<body>
<?php include '../views/layouts/header.php'; ?>
<div class="container">
    <?php if ($_GET['message']): ?>
        <h4 class="mt-5 text-danger"><?= $_GET['message'] ?></h4>
    <?php endif; ?>
    <?php if (isset($_SESSION['userId'])): ?>
        <h4 class="mt-5"><?= User::getUser($_SESSION['userId'])['email']; ?></h4>
        <form class="w-75 mx-auto" action="/user/edit/<?= $_SESSION['userId']; ?>" method="post">
            <h5>Редактировать данные</h5>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name" value="<?= User::getUser($_SESSION['userId'])['name']; ?>">
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="login" class="form-control" id="login" name="login" value="<?= User::getUser($_SESSION['userId'])['login']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= User::getUser($_SESSION['userId'])['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= User::getUser($_SESSION['userId'])['password']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
