<header class="bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Главная</a>
                <div class="collapse justify-content-end navbar-collapse">
                    <ul class="navbar-nav">
                        <?php if (!isset($_SESSION['userId'])): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="/register">Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Вход</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/profile">Личный кабинет</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Выход</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
