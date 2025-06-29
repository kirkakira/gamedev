<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Создание новой категории';
$this->params['breadcrumbs'][] = ['label' => 'Форумы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-create animate-in">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h1 class="fw-bold text-white"><?= Html::encode($this->title) ?> <span class="gradient-text">Forum</span></h1>
                    <p class="text-muted">Добавьте новую категорию для обсуждений</p>
                </div>

                <div class="card glass-effect hover-grow">
                    <div class="card-header bg-gradient-primary text-white border-bottom border-primary">
                        <h3 class="fw-bold mb-0"><i class="bi bi-tag me-2"></i>Параметры категории</h3>
                    </div>
                    <div class="card-body">
                        <?php $form = ActiveForm::begin([
                            'fieldConfig' => [
                                'options' => ['class' => 'mb-4'],
                                'labelOptions' => ['class' => 'form-label text-white'],
                                'inputOptions' => ['class' => 'form-control glass-effect text-white'],
                                'template' => "{label}\n{input}\n{hint}\n{error}"
                            ]
                        ]); ?>

                        <?= $form->field($model, 'name')->textInput([
                            'maxlength' => true,
                            'placeholder' => 'Введите название категории'
                        ]) ?>

                        <?= $form->field($model, 'description')->textarea([
                            'rows' => 4,
                            'placeholder' => 'Опишите назначение категории...'
                        ]) ?>

                        <div class="form-group mt-5 d-flex justify-content-between">
                            <?= Html::a('<i class="bi bi-arrow-left me-2"></i> Отмена', ['view', 'id' => $model->forum_id], [
                                'class' => 'btn btn-outline-secondary glass-effect'
                            ]) ?>
                            <?= Html::submitButton('<i class="bi bi-save me-2"></i> Создать категорию', [
                                'class' => 'btn btn-primary glass-effect hover-grow'
                            ]) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Основные стили */
    .category-create {
        background-color: #0f172a;
        min-height: 100vh;
    }

    /* Эффекты стекла */
    .glass-effect {
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(67, 97, 238, 0.2);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    /* Градиентный текст */
    .gradient-text {
        background: linear-gradient(90deg, #4361ee, #3a0ca3);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 700;
    }

    /* Анимации */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    /* Эффекты при наведении */
    .hover-grow {
        transition: all 0.3s ease;
    }

    .hover-grow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
    }

    /* Границы */
    .border-primary {
        border-color: rgba(67, 97, 238, 0.5) !important;
    }

    /* Текст */
    .text-muted {
        color: rgba(255, 255, 255, 0.6) !important;
    }

    /* Формы */
    .form-control {
        background: rgba(15, 23, 42, 0.5) !important;
        border: 1px solid rgba(67, 97, 238, 0.3) !important;
        color: white !important;
        transition: all 0.3s;
    }

    .form-control:focus {
        background: rgba(15, 23, 42, 0.7) !important;
        border-color: #4361ee !important;
        box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25) !important;
        color: white !important;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5) !important;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
        display: block;
    }

    /* Карточки */
    .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
    }

    .card-header {
        padding: 1.25rem 1.5rem;
    }

    /* Градиентный фон */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
    }

    /* Кнопки */
    .btn {
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s;
    }

    .btn-primary {
        background-color: #4361ee;
        border-color: #4361ee;
    }

    .btn-primary:hover {
        background-color: #3a56d4;
        border-color: #3a56d4;
    }

    .btn-outline-secondary {
        color: rgba(255, 255, 255, 0.8);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .btn-outline-secondary:hover {
        color: #0f172a;
        background-color: rgba(255, 255, 255, 0.9);
    }
</style>