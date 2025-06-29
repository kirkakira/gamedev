<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Project;
$this->title = 'Финансирование';

?>

<div class="donation-create-page">
    <div class="donation-form-card">
        <div class="donation-form-header">
            <div class="back-icon" onclick="window.history.back()"></div>
            <h1>Создание пожертвования</h1>
            <p>Поддержите игровые проекты сообщества</p>
        </div>

        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'elegant-form'],
            'fieldConfig' => [
                'template' => "{label}{input}{error}",
                'errorOptions' => ['class' => 'form-error']
            ]]); ?>

        <div class="form-group with-icon amount-field">
            <label>Сумма пожертвования</label>
            <div class="currency-icon">₽</div>
            <?= $form->field($model, 'amount', [
                'inputOptions' => [
                    'placeholder' => ' ',
                    'type' => 'number',
                    'step' => '0.01',
                    'min' => '1'
                ]
            ])->textInput()->label(false) ?>
        </div>

        <div class="form-group with-icon">
            <label>Вознаграждение (необязательно)</label>
            <div class="input-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                </svg>
            </div>
            <?= $form->field($model, 'reward', [
                'inputOptions' => [
                    'placeholder' => ' ',
                    'maxlength' => true
                ]
            ])->textInput()->label(false) ?>
        </div>

        <div class="form-group with-icon">
            <label>Выберите проект</label>
            <div class="input-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <?= $form->field($model, 'project_id', [
                'template' => "{input}{error}"
            ])->dropDownList(
                ArrayHelper::map(Project::find()->all(), 'id', 'title'),
                ['prompt' => 'Выберите проект']
            )->label(false) ?>
        </div>

        <div class="form-footer">
            <?= Html::submitButton('Создать пожертвование', [
                'class' => 'submit-btn'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<style>
    .donation-create-page {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(135deg, #0f172a, #1e293b);
        padding: 20px;
        font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .donation-form-card {
        width: 100%;
        max-width: 480px;
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

    .donation-form-header {
        text-align: center;
        padding: 32px 30px 24px;
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        position: relative;
    }

    .donation-form-header h1 {
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 8px;
        letter-spacing: -0.2px;
    }

    .donation-form-header p {
        font-size: 14px;
        opacity: 0.85;
        margin: 0;
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

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 14px 16px 14px 48px;
        background: rgba(15, 23, 42, 0.4);
        border: 1px solid rgba(67, 97, 238, 0.2);
        border-radius: 12px;
        color: rgba(255, 255, 255, 0.95);
        font-size: 15px;
        transition: all 0.3s ease;
        outline: none;
        appearance: none;
    }

    .form-group select {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%234361ee' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 16px;
        padding-right: 40px;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: rgba(67, 97, 238, 0.5);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        background: rgba(15, 23, 42, 0.5);
    }

    .form-group input::placeholder {
        color: rgba(255, 255, 255, 0.3);
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

    .amount-field .currency-icon {
        position: absolute;
        left: 14px;
        top: 34px;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(67, 97, 238, 0.8);
        font-weight: 600;
        font-size: 16px;
    }

    .form-group input:focus + .input-icon,
    .form-group select:focus + .input-icon {
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

    .donation-form-card {
        animation: fadeIn 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    }

    /* Анимация для иконок */
    .input-icon svg {
        transition: transform 0.3s ease;
    }

    .form-group:hover .input-icon svg {
        transform: scale(1.1);
    }

    /* Стили для выпадающего списка */
    select option {
        background: rgba(15, 23, 42, 0.9);
        color: white;
        padding: 10px;
    }

    select option:checked {
        background: rgba(67, 97, 238, 0.3);
    }

    /* Адаптивность */
    @media (max-width: 520px) {
        .donation-form-card {
            max-width: 100%;
        }

        .donation-form-header {
            padding: 26px 20px 20px;
        }

        .elegant-form {
            padding: 24px 20px;
        }

        .form-group input,
        .form-group select {
            padding: 12px 14px 12px 42px;
            font-size: 14px;
        }

        .input-icon {
            left: 12px;
            top: 32px;
            width: 20px;
            height: 20px;
        }

        .amount-field .currency-icon {
            left: 12px;
            top: 32px;
        }
    }
</style>