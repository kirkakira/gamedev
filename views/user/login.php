<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
$this->title = 'Авторизация';

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */
?>

<div class="site-login">
    <section class="login-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-card card border-0 shadow-lg animate-in">
                        <div class="card-header bg-gradient-primary text-white text-center py-4">
                            <div class="game-icon mx-auto mb-3">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <h1 class="fw-bold mb-0">Вход в систему</h1>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            <p class="text-center text-muted mb-4">Пожалуйста, заполните поля ниже для входа в систему</p>

                            <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'options' => ['class' => 'login-form']
                            ]); ?>

                            <div class="mb-4">
                                <?= $form->field($model, 'username', [
                                    'inputTemplate' => '<div class="input-group"><span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>{input}</div>'
                                ])->textInput([
                                    'autofocus' => true,
                                    'class' => 'form-control border-start-0 ps-0',
                                    'placeholder' => 'Ваш логин'
                                ])->label('Логин') ?>
                            </div>

                            <div class="mb-4">
                                <?= $form->field($model, 'password', [
                                    'inputTemplate' => '<div class="input-group"><span class="input-group-text bg-light border-end-0"><i class="bi bi-lock"></i></span>{input}</div>'
                                ])->passwordInput([
                                    'class' => 'form-control border-start-0 ps-0',
                                    'placeholder' => 'Ваш пароль'
                                ])->label('Пароль') ?>
                            </div>

                            <div class="mb-4">
                                <?= $form->field($model, 'rememberMe')->checkbox([
                                    'class' => 'form-check-input',
                                    'template' => "<div class=\"form-check\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>"
                                ]) ?>
                            </div>

                            <div class="text-center mb-4">
                                <?= Html::a('Забыли пароль?', ['site/request-password-reset'], [
                                    'class' => 'text-decoration-none text-primary fw-medium'
                                ]) ?>
                            </div>

                            <div class="mb-4">
                                <?= Html::submitButton('<i class="bi bi-box-arrow-in-right me-2"></i> Войти в систему', [
                                    'class' => 'btn btn-primary w-100 py-3 fw-bold',
                                    'name' => 'login-button'
                                ]) ?>
                            </div>

                            <div class="social-login mb-4">
                                <div class="social-title position-relative text-center mb-4">
                                    <span class="px-3 bg-white position-relative">Или войдите через</span>
                                </div>

                                <div class="social-buttons d-flex justify-content-center gap-3">
                                    <a href="#" class="social-btn btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-google"></i>
                                    </a>
                                    <a href="#" class="social-btn btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="social-btn btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-github"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="register-link text-center pt-3 border-top">
                                <p class="mb-0">Ещё нет аккаунта? <?= Html::a('Зарегистрируйтесь сейчас', ['/user/signup'], [
                                        'class' => 'fw-bold text-decoration-none'
                                    ]) ?></p>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
