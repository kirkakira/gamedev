<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
$this->title = 'Контакты';

/* @var $this yii\web\View */
/* @var $model app\models\ContactForm */
?>

<div class="site-contact">
    <section class="hero-section py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 animate-in">
                    <h1 class="display-4 fw-bold mb-4">Свяжитесь <span class="gradient-text">с нами</span></h1>
                    <p class="lead mb-4">Есть вопросы или предложения? Мы всегда рады услышать ваше мнение и помочь с любыми вопросами.</p>

                    <div class="contact-info mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon bg-primary text-white rounded-circle p-3 me-3">
                                <i class="bi bi-envelope fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Email</h5>
                                <p class="mb-0">support@gamedevstudio.com</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon bg-primary text-white rounded-circle p-3 me-3">
                                <i class="bi bi-telephone fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Телефон</h5>
                                <p class="mb-0">+7 (495) 123-45-67</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="contact-icon bg-primary text-white rounded-circle p-3 me-3">
                                <i class="bi bi-geo-alt fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Адрес</h5>
                                <p class="mb-0">Москва, ул. Разработчиков, д. 15</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 animate-in delay-1">
                    <div class="contact-card card glass-effect">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <div class="game-icon mx-auto float-animation">
                                    <i class="bi bi-chat-dots"></i>
                                </div>
                                <h3 class="fw-bold mt-3">Напишите нам</h3>
                                <p class="text-muted">Заполните форму ниже, и мы свяжемся с вами в ближайшее время</p>
                            </div>

                            <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
                                <div class="alert alert-success animate-in">
                                    <i class="bi bi-check-circle me-2"></i> Спасибо за обращение! Мы свяжемся с вами в ближайшее время.
                                </div>
                            <?php else: ?>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'contact-form',
                                    'fieldConfig' => [
                                        'template' => "{label}\n{input}\n{error}",
                                        'inputOptions' => ['class' => 'form-control'],
                                        'errorOptions' => ['class' => 'invalid-feedback']
                                    ]
                                ]); ?>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <?= $form->field($model, 'name')->textInput([
                                            'autofocus' => true,
                                            'placeholder' => 'Ваше имя'
                                        ]) ?>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <?= $form->field($model, 'email')->textInput([
                                            'placeholder' => 'Ваш email'
                                        ]) ?>
                                    </div>
                                </div>

                                <?= $form->field($model, 'subject')->textInput([
                                'placeholder' => 'Тема сообщения'
                            ]) ?>

                                <?= $form->field($model, 'body')->textarea([
                                'rows' => 5,
                                'placeholder' => 'Ваше сообщение...'
                            ]) ?>

                                <div class="mb-4">
                                    <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
                                        'template' => '<div class="row align-items-center"><div class="col-lg-4 mb-2 mb-lg-0">{image}</div><div class="col-lg-8">{input}</div></div>',
                                        'options' => ['class' => 'form-control', 'placeholder' => 'Введите код'],
                                    ])->label(false) ?>
                                </div>

                                <div class="form-group">
                                    <?= Html::submitButton('Отправить сообщение', [
                                        'class' => 'btn btn-primary w-100 py-3 fw-bold hover-grow',
                                        'name' => 'contact-button'
                                    ]) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map-section py-5 bg-dark">
        <div class="container">
            <div class="text-center mb-5 animate-in">
                <h2 class="fw-bold mb-3">Наше <span class="gradient-text">местоположение</span></h2>
                <div class="divider"></div>
            </div>

            <div class="card glass-effect animate-in delay-1">
                <div class="card-body p-0">
                    <div class="map-container" style="height: 400px; background: #1e293b; border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="text-center p-4">
                                <div class="game-icon bg-primary mx-auto mb-4 float-animation">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <h4 class="fw-bold">Москва, ул. Разработчиков, д. 15</h4>
                                <p class="text-muted">Центральный офис GameDev Studio</p>
                                <a href="#" class="btn btn-outline-primary mt-2 hover-grow">
                                    <i class="bi bi-geo-alt me-2"></i> Построить маршрут
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section py-5 bg-dark">
        <div class="container">
            <div class="text-center mb-5 animate-in">
                <h2 class="fw-bold mb-3">Часто задаваемые <span class="gradient-text">вопросы</span></h2>
                <div class="divider"></div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 animate-in delay-1">
                    <div class="card glass-effect h-100 hover-grow">
                        <div class="card-body p-4">
                            <h4 class="fw-bold d-flex align-items-center">
                                <i class="bi bi-question-circle text-primary me-3"></i>
                                Как присоединиться к проекту?
                            </h4>
                            <p class="mt-3 mb-0">Вы можете просмотреть доступные проекты в разделе "Проекты" и связаться с их создателями напрямую через систему сообщений платформы.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 animate-in delay-2">
                    <div class="card glass-effect h-100 hover-grow">
                        <div class="card-body p-4">
                            <h4 class="fw-bold d-flex align-items-center">
                                <i class="bi bi-question-circle text-primary me-3"></i>
                                Как создать собственный проект?
                            </h4>
                            <p class="mt-3 mb-0">После регистрации перейдите в раздел "Проекты" и нажмите "Создать проект". Заполните информацию о вашей игре и опубликуйте проект для привлечения команды.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 animate-in delay-1">
                    <div class="card glass-effect h-100 hover-grow">
                        <div class="card-body p-4">
                            <h4 class="fw-bold d-flex align-items-center">
                                <i class="bi bi-question-circle text-primary me-3"></i>
                                Есть ли комиссия за использование платформы?
                            </h4>
                            <p class="mt-3 mb-0">Нет, GameDev Studio полностью бесплатна для разработчиков. Мы не берем комиссию с проектов и пожертвований.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 animate-in delay-2">
                    <div class="card glass-effect h-100 hover-grow">
                        <div class="card-body p-4">
                            <h4 class="fw-bold d-flex align-items-center">
                                <i class="bi bi-question-circle text-primary me-3"></i>
                                Как получить поддержку для моего проекта?
                            </h4>
                            <p class="mt-3 mb-0">Вы можете добавить раздел финансирования к вашему проекту и установить цели. Пользователи смогут поддержать ваш проект пожертвованиями.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>