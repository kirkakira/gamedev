<?php

use yii\bootstrap5\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <style>
            :root {
                --primary-color: #4361ee;
                --primary-hover: #3a56d4;
                --secondary-color: #f8f9fa;
                --text-dark: #2c3e50;
                --text-light: #6c757d;
                --border-color: #e0e6ed;
                --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                --glass-effect: rgba(255, 255, 255, 0.1);
                --glass-border: 1px solid rgba(255, 255, 255, 0.2);
                --glass-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            }

            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                background-color: #0f172a;
                color: #fff;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .wrap {
                flex: 1;
                display: flex;
                flex-direction: column;
            }

            /* Анимации */
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
                100% { transform: translateY(0px); }
            }

            .animate-in {
                animation: fadeIn 0.6s ease-out forwards;
            }

            .animate-in.delay-1 { animation-delay: 0.2s; }
            .animate-in.delay-2 { animation-delay: 0.4s; }
            .animate-in.delay-3 { animation-delay: 0.6s; }

            .float-animation {
                animation: float 4s ease-in-out infinite;
            }

            /* Навигация */
            .navbar {
                background-color: rgba(15, 23, 42, 0.8);
                backdrop-filter: blur(10px);
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
                padding: 0.5rem 1rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .navbar-brand {
                font-weight: 700;
                color: #fff !important;
                font-size: 1.5rem;
                display: flex;
                align-items: center;
            }

            .navbar-brand i {
                margin-right: 8px;
                color: var(--primary-color);
            }

            .nav-link {
                font-weight: 500;
                color: rgba(255, 255, 255, 0.8) !important;
                padding: 0.5rem 1rem;
                border-radius: 6px;
                transition: all 0.3s;
                margin: 0 2px;
            }

            .nav-link:hover, .nav-link.active {
                background-color: var(--primary-color);
                color: white !important;
                transform: translateY(-2px);
            }

            .logout {
                padding: 0.25rem 0.5rem;
                color: var(--text-light);
            }

            .logout:hover {
                color: var(--primary-hover) !important;
                background: transparent !important;
            }

            /* Стеклянный эффект */
            .glass-effect {
                background: var(--glass-effect);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: var(--glass-border);
                box-shadow: var(--glass-shadow);
            }

            /* Градиентный текст */
            .gradient-text {
                background: linear-gradient(90deg, #4361ee, #3a0ca3);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
                font-weight: 700;
            }

            .container {
                padding-top: 30px;
                padding-bottom: 30px;
            }

            .breadcrumb {
                background-color: transparent;
                padding: 0.75rem 0;
                margin-bottom: 1.5rem;
            }

            .breadcrumb-item a {
                color: rgba(255, 255, 255, 0.7);
                text-decoration: none;
            }

            .breadcrumb-item.active {
                color: var(--primary-color);
                font-weight: 500;
            }

            .footer {
                background-color: rgba(15, 23, 42, 0.8);
                backdrop-filter: blur(10px);
                color: rgba(255, 255, 255, 0.7);
                padding: 1.5rem 0;
                margin-top: auto;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .footer p {
                margin: 0;
                text-align: center;
                font-size: 0.9rem;
            }

            /* Карточки */
            .card {
                border: none;
                border-radius: 12px;
                overflow: hidden;
                margin-bottom: 30px;
                transition: all 0.3s;
                background: rgba(15, 23, 42, 0.6);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }

            .card-header {
                background: rgba(67, 97, 238, 0.2);
                color: white;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                font-weight: 600;
                padding: 1rem 1.5rem;
            }

            .card-body {
                padding: 1.5rem;
                color: rgba(255, 255, 255, 0.8);
            }

            /* Кнопки */
            .btn-primary {
                background-color: var(--primary-color);
                border-color: var(--primary-color);
                border-radius: 8px;
                padding: 0.5rem 1.25rem;
                font-weight: 500;
                transition: all 0.3s;
            }

            .btn-primary:hover {
                background-color: var(--primary-hover);
                border-color: var(--primary-hover);
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
            }

            .btn-outline-primary {
                color: var(--primary-color);
                border-color: var(--primary-color);
            }

            .btn-outline-primary:hover {
                background-color: var(--primary-color);
                color: white;
            }

            /* Эффект роста при наведении */
            .hover-grow {
                transition: all 0.3s;
            }

            .hover-grow:hover {
                transform: scale(1.05);
            }

            /* Формы */
            .form-control {
                border-radius: 8px;
                padding: 0.75rem 1rem;
                border: 1px solid rgba(255, 255, 255, 0.2);
                background: rgba(255, 255, 255, 0.1);
                color: white;
                transition: all 0.3s;
            }

            .form-control:focus {
                border-color: var(--primary-color);
                box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
                background: rgba(255, 255, 255, 0.2);
            }

            .form-control::placeholder {
                color: rgba(255, 255, 255, 0.5);
            }

            /* Заголовки */
            .page-title {
                color: white;
                font-weight: 700;
                margin-bottom: 1.5rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            /* Аватар пользователя */
            .user-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: var(--primary-color);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 600;
                margin-right: 10px;
            }

            /* Выпадающее меню */
            .dropdown-menu {
                border-radius: 8px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                border: none;
                padding: 0.5rem 0;
                background: rgba(15, 23, 42, 0.9);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .dropdown-item {
                padding: 0.5rem 1rem;
                transition: all 0.2s;
                color: rgba(255, 255, 255, 0.8);
            }

            .dropdown-item:hover {
                background-color: rgba(67, 97, 238, 0.3);
                color: white;
            }

            .dropdown-divider {
                margin: 0.25rem 0;
                border-color: rgba(255, 255, 255, 0.1);
            }

            /* Иконки игр */
            .game-icon {
                width: 80px;
                height: 80px;
                background: rgba(67, 97, 238, 0.2);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                color: var(--primary-color);
                margin: 0 auto 1rem;
            }

            .game-icon-sm {
                width: 50px;
                height: 50px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
            }

            /* Уведомления */
            .alert {
                border-radius: 8px;
                border: none;
            }

            /* Разделитель */
            .divider {
                height: 3px;
                width: 80px;
                background: linear-gradient(90deg, #4361ee, #3a0ca3);
                margin: 1rem auto;
                border-radius: 3px;
            }

            /* Контент */
            .content-wrapper {
                opacity: 0;
                animation: fadeIn 0.6s ease-out 0.2s forwards;
            }
        </style>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => '<i class="bi bi-controller"></i> GameDev Studio',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-lg navbar-dark',
            ],
            'innerContainerOptions' => ['class' => 'container-fluid'],
        ]);

        $menuItems = [
            ['label' => '<i class="bi bi-house-door"></i> Главная', 'url' => ['/site/index'], 'encode' => false],
            ['label' => '<i class="bi bi-folder"></i> Проекты', 'url' => ['/project/index'], 'encode' => false],
            ['label' => '<i class="bi bi-chat-dots"></i> Форум', 'url' => ['/forum/index'], 'encode' => false],
            ['label' => '<i class="bi bi-people"></i> Команды', 'url' => ['/team/index'], 'encode' => false],
            ['label' => '<i class="bi bi-cash-coin"></i> Финансирование', 'url' => ['/donation/index'], 'encode' => false],
        ];

        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => '<i class="bi bi-door-open"></i> Вход', 'url' => ['/user/login'], 'encode' => false, 'class' => 'btn btn-outline-primary ms-2'];
            $menuItems[] = ['label' => '<i class="bi bi-person-plus"></i> Регистрация', 'url' => ['/user/signup'], 'encode' => false, 'class' => 'btn btn-primary ms-2'];
        } else {
            // Создаем аватар пользователя
            $username = Yii::$app->user->identity->username;
            $firstLetter = mb_substr($username, 0, 1);

            $userMenu = [
                '<li class="nav-item dropdown">',
                Html::a(
                    '<div class="user-avatar">' . $firstLetter . '</div>' .
                    Html::encode($username) .
                    '<i class="bi bi-caret-down-fill ms-1"></i>',
                    ['#'],
                    [
                        'class' => 'nav-link dropdown-toggle d-flex align-items-center',
                        'id' => 'navbarDropdown',
                        'role' => 'button',
                        'data-bs-toggle' => 'dropdown',
                        'aria-expanded' => 'false',
                        'encode' => false
                    ]
                ),
                '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">',
                '<li>' . Html::a('<i class="bi bi-person me-2"></i> Профиль', ['/user/profile'], ['class' => 'dropdown-item']) . '</li>',
                '<li>' . Html::a('<i class="bi bi-gear me-2"></i> Настройки', ['#'], ['class' => 'dropdown-item']) . '</li>',
                '<li>' . Html::a('<i class="bi bi-bookmark me-2"></i> Мои закладки', ['#'], ['class' => 'dropdown-item']) . '</li>',
                '<li><hr class="dropdown-divider"></li>',
                '<li>' . Html::a(
                    '<i class="bi bi-box-arrow-right me-2"></i> Выход',
                    ['/user/logout'],
                    [
                        'class' => 'dropdown-item',
                        'data-method' => 'post'
                    ]
                ) . '</li>',
                '</ul>',
                '</li>'
            ];

            $menuItems[] = implode("\n", $userMenu);
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto mb-2 mb-lg-0 align-items-center'],
            'items' => $menuItems,
            'encodeLabels' => false,
        ]);

        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'] ?? [],
                'homeLink' => [
                    'label' => '<i class="bi bi-house-door"></i> Главная',
                    'url' => Yii::$app->homeUrl,
                    'encode' => false
                ],
                'options' => ['class' => 'breadcrumb'],
                'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                'activeItemTemplate' => '<li class="breadcrumb-item active">{link}</li>'
            ]) ?>

            <!-- Блок статуса авторизации для мобильных устройств -->
            <div class="d-lg-none mb-4 animate-in">
                <?php if (Yii::$app->user->isGuest): ?>
                    <div class="alert alert-warning p-3 text-center glass-effect">
                        <i class="bi bi-person-x"></i> Вы не авторизованы
                    </div>
                <?php else: ?>
                    <div class="alert alert-info p-3 text-center glass-effect">
                        <i class="bi bi-person-check"></i> Вы вошли как: <?= Html::encode(Yii::$app->user->identity->username) ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="content-wrapper">
                <?= $content ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>© GameDev Studio <?= date('Y') ?> | Разработка игр и сообщество разработчиков</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>