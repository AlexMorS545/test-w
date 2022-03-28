<!doctype html>
<html lang="en">
<head>
    <?php include '../views/layouts/head.php';?>
</head>
<body>
<?php include '../views/layouts/header.php'; ?>
<div class="container">
    <h1>Work5</h1>
    <table class="table">
        <h5 class="text-primary">список email'лов встречающихся более чем у одного пользователя</h5>
        <tbody>
        <?php foreach ($emails_more_one as $item): ?>
            <tr>
                <td><?= $item['email']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <table class="table">
        <h5 class="text-primary">вывести список логинов пользователей, которые не сделали ни одного заказа</h5>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Login</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($not_orders as $item): ?>
            <?php if (empty($item['user_id'])): ?>
                <tr>
                    <td><?= $item['id']; ?></td>
                    <td><?= $item['login']; ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
    <table class="table">
        <h5 class="text-primary">вывести список логинов пользователей которые сделали более двух заказов</h5>
        <tbody>
        <?php foreach ($more_two_orders as $item): ?>
            <tr>
                <td><?= $item['id']; ?></td>
                <td><?= $item['login']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
