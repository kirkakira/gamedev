<?php
use yii\helpers\Html;
$this->title = 'Профиль';

use yii\widgets\ActiveForm;
?>

<div class="profile-edit-page">
    <div class="profile-card">
        <div class="profile-header">
            <?= Html::a('<div class="back-icon"></div>', ['site/index']) ?>

            <div class="avatar-circle">
                <?php
                $username = Yii::$app->user->identity->username;
                $firstLetter = mb_substr($username, 0, 1);
                echo Html::encode($firstLetter);
                ?>
            </div>

            <h1>Редактирование профиля</h1>
            <p>Обновите свои личные данные</p>
        </div>

        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'elegant-form'],
            'fieldConfig' => [
                'template' => "{label}{input}{error}",
                'errorOptions' => ['class' => 'form-error']
            ]
        ]); ?>

        <div class="form-group with-icon">
            <?= $form->field($model, 'username', [
                'inputOptions' => [
                    'placeholder' => ' ',
                    'autofocus' => true
                ]
            ])->label('Логин') ?>
            <div class="input-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </div>
        </div>

        <div class="form-group with-icon">
            <?= $form->field($model, 'email', [
                'inputOptions' => [
                    'placeholder' => ' '
                ]
            ])->label('Email') ?>
            <div class="input-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                </svg>
            </div>
        </div>

        <div class="form-group with-icon">
            <?= $form->field($model, 'newPassword', [
                'inputOptions' => [
                    'placeholder' => ' ',
                    'autocomplete' => 'new-password'
                ]
            ])->passwordInput()->label('Новый пароль') ?>
            <div class="input-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                </svg>
            </div>
            <div class="form-hint">Оставьте пустым, если не хотите менять</div>
        </div>

        <div class="form-footer">
            <?= Html::submitButton('Сохранить изменения', [
                'class' => 'submit-btn'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<style>
    .profile-edit-page {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(135deg, #0f172a, #1e293b);
        padding: 20px;
        font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .profile-card {
        width: 100%;
        max-width: 420px;
        background: rgba(15, 23, 42, 0.68);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-radius: 20px;
        border: 1px solid rgba(67, 97, 238, 0.28);
        box-shadow:
                0 12px 30px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.06) inset;
        overflow: hidden;
    }

    .profile-header {
        text-align: center;
        padding: 32px 30px 24px;
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        position: relative;
    }

    .back-icon {
        position: absolute;
        top: 22px;
        left: 22px;
        width: 24px;
        height: 24px;
        cursor: pointer;
        opacity: 0.8;
        transition: all 0.3s ease;
    }

    .back-icon:hover {
        opacity: 1;
        transform: translateX(-3px);
    }

    .back-icon::before,
    .back-icon::after {
        content: '';
        position: absolute;
        height: 2px;
        width: 14px;
        background: white;
        border-radius: 1px;
        left: 0;
        top: 11px;
    }

    .back-icon::before {
        transform: rotate(45deg) translateY(-3px);
    }

    .back-icon::after {
        transform: rotate(-45deg) translateY(3px);
    }

    .avatar-circle {
        width: 80px;
        height: 80px;
        margin: 0 auto 15px;
        background: linear-gradient(135deg, #4d6df1, #4510c2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        font-weight: 600;
        color: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .avatar-circle:hover {
        transform: scale(1.05);
        box-shadow: 0 7px 20px rgba(0, 0, 0, 0.35);
    }

    .profile-header h1 {
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 5px;
        letter-spacing: -0.2px;
    }

    .profile-header p {
        font-size: 14px;
        opacity: 0.85;
        margin: 0;
    }

    .elegant-form {
        padding: 28px 30px;
    }

    .form-group {
        position: relative;
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        color: rgba(255, 255, 255, 0.75);
        margin-bottom: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .form-group input {
        width: 100%;
        padding: 14px 16px 14px 48px;
        background: rgba(15, 23, 42, 0.4);
        border: 1px solid rgba(67, 97, 238, 0.2);
        border-radius: 12px;
        color: rgba(255, 255, 255, 0.95);
        font-size: 15px;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-group input:focus {
        border-color: rgba(67, 97, 238, 0.5);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        background: rgba(15, 23, 42, 0.5);
    }

    .form-group input::placeholder {
        color: rgba(255, 255, 255, 0.3);
    }

    .form-hint {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
        margin-top: 6px;
    }

    .input-icon {
        position: absolute;
        left: 14px;
        top: 34px;
        width: 24px;
        height: 24px;
        color: rgba(67, 97, 238, 0.8);
        transition: all 0.3s ease;
    }

    .form-group input:focus + .input-icon {
        color: #4361ee;
        transform: scale(1.1);
    }

    .input-icon svg {
        width: 100%;
        height: 100%;
        fill: currentColor;
    }

    .form-error {
        display: block;
        font-size: 12.5px;
        color: #ff6b6b;
        margin-top: 5px;
    }

    .form-footer {
        margin-top: 30px;
    }

    .submit-btn {
        width: 100%;
        padding: 14px 20px;
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(67, 97, 238, 0.4);
    }

    .submit-btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 8px rgba(67, 97, 238, 0.3);
    }

    .submit-btn::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: all 0.6s ease;
    }

    .submit-btn:hover::after {
        left: 100%;
    }

    /* Анимации */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .profile-card {
        animation: fadeIn 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    }

    /* Адаптивность */
    @media (max-width: 480px) {
        .profile-card {
            max-width: 100%;
        }

        .profile-header {
            padding: 26px 20px 20px;
        }

        .elegant-form {
            padding: 24px 20px;
        }

        .avatar-circle {
            width: 72px;
            height: 72px;
            font-size: 28px;
        }
    }
</style>