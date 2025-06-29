<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */

$this->title = 'Вход в систему';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .login-page {
        max-width: 500px;
        margin: 0 auto;
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-icon {
        font-size: 3rem;
        color: #4361ee;
        margin-bottom: 15px;
    }

    .login-title {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .login-subtitle {
        color: #6c757d;
        font-size: 1.1rem;
    }

    .form-check-input:checked {
        background-color: #4361ee;
        border-color: #4361ee;
    }

    .password-reset-link {
        font-size: 0.9rem;
        color: #4361ee;
        text-decoration: none;
    }

    .password-reset-link:hover {
        text-decoration: underline;
    }

    .social-login {
        margin-top: 30px;
        text-align: center;
    }

    .social-title {
        position: relative;
        text-align: center;
        color: #6c757d;
        font-size: 0.9rem;
        margin: 20px 0;
    }

    .social-title::before,
    .social-title::after {
        content: "";
        position: absolute;
        top: 50%;
        width: 30%;
        height: 1px;
        background-color: #e0e6ed;
    }

    .social-title::before {
        left: 0;
    }

    .social-title::after {
        right: 0;
    }

    .social-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: #f8f9fa;
        color: #6c757d;
        font-size: 1.2rem;
        transition: all 0.3s;
        border: 1px solid #e0e6ed;
    }

    .social-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        color: #4361ee;
    }

    .register-link {
        text-align: center;
        margin-top: 20px;
        font-size: 0.95rem;
    }

    .register-link a {
        color: #4361ee;
        font-weight: 500;
        text-decoration: none;
    }

    .register-link a:hover {
        text-decoration: underline;
    }
</style>

<div class="login-page">
    <div class="login-header">
        <div class="login-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
        <h1 class="login-title"><?= Html::encode($this->title) ?></h1>
        <p class="login-subtitle">Пожалуйста, заполните поля ниже для входа в систему</p>
    </div>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'login-form']
    ]); ?>

    <?= $form->field($model, 'username', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-text"><i class="bi bi-person"></i></span>{input}</div>'
    ])->textInput(['autofocus' => true, 'placeholder' => 'Ваш логин']) ?>

    <?= $form->field($model, 'password', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-text"><i class="bi bi-lock"></i></span>{input}</div>'
    ])->passwordInput(['placeholder' => 'Ваш пароль']) ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div style="text-align: center; margin: 1.5rem 0;">
        <?= Html::a('Забыли пароль?', ['site/request-password-reset'], ['class' => 'password-reset-link']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="bi bi-box-arrow-in-right"></i> Войти', [
            'class' => 'btn btn-primary w-100 py-2',
            'name' => 'login-button'
        ]) ?>
    </div>

    <div class="social-login">
        <div class="social-title">Или войдите через</div>
        <div class="social-buttons">
            <a href="#" class="social-btn"><i class="bi bi-google"></i></a>
            <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-btn"><i class="bi bi-github"></i></a>
        </div>
    </div>

    <div class="register-link">
        Ещё нет аккаунта? <?= Html::a('Зарегистрируйтесь сейчас', ['/user/signup']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>