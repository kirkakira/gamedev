<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование проекта: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="container py-5 animate-in">
    <div class="project-update glass-effect">
        <div class="mb-5 text-center">
            <h1 class="fw-bold text-white">Редактирование: <span class="gradient-text"><?= Html::encode($model->title) ?></span></h1>
            <p class="text-muted">Обновите информацию о вашем проекте</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card glass-effect p-4 animate-in delay-1">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'title', [
                        'options' => ['class' => 'mb-4'],
                        'labelOptions' => ['class' => 'form-label text-white']
                    ])->textInput([
                        'maxlength' => true,
                        'class' => 'form-control glass-effect text-white',
                        'placeholder' => 'Название проекта'
                    ]) ?>

                    <?= $form->field($model, 'description', [
                        'options' => ['class' => 'mb-4'],
                        'labelOptions' => ['class' => 'form-label text-white']
                    ])->textarea([
                        'rows' => 6,
                        'class' => 'form-control glass-effect text-white',
                        'placeholder' => 'Описание проекта...'
                    ]) ?>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'genre', [
                                'options' => ['class' => 'mb-4'],
                                'labelOptions' => ['class' => 'form-label text-white']
                            ])->textInput([
                                'maxlength' => true,
                                'class' => 'form-control glass-effect text-white',
                                'placeholder' => 'Жанр проекта'
                            ]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'platform', [
                                'options' => ['class' => 'mb-4'],
                                'labelOptions' => ['class' => 'form-label text-white']
                            ])->textInput([
                                'maxlength' => true,
                                'class' => 'form-control glass-effect text-white',
                                'placeholder' => 'Платформа'
                            ]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'target_audience', [
                                'options' => ['class' => 'mb-4'],
                                'labelOptions' => ['class' => 'form-label text-white']
                            ])->textInput([
                                'maxlength' => true,
                                'class' => 'form-control glass-effect text-white',
                                'placeholder' => 'Целевая аудитория'
                            ]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'development_stage', [
                                'options' => ['class' => 'mb-4'],
                                'labelOptions' => ['class' => 'form-label text-white']
                            ])->textInput([
                                'maxlength' => true,
                                'class' => 'form-control glass-effect text-white',
                                'placeholder' => 'Стадия разработки'
                            ]) ?>
                        </div>
                    </div>

                    <div class="form-group mt-5 text-center">
                        <?= Html::submitButton('<i class="bi bi-save me-2"></i> Сохранить изменения', [
                            'class' => 'btn btn-primary btn-lg px-5 py-3 glass-effect hover-grow'
                        ]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .project-update {
        border-radius: 16px;
        padding: 3rem;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(67, 97, 238, 0.3);
    }

    .form-card {
        border-radius: 12px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(67, 97, 238, 0.2);
    }

    .form-control {
        background: rgba(15, 23, 42, 0.5);
        border: 1px solid rgba(67, 97, 238, 0.3);
        color: white;
        transition: all 0.3s;
    }

    .form-control:focus {
        background: rgba(15, 23, 42, 0.7);
        border-color: #4361ee;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.3);
        color: white;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .hover-grow {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-grow:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
    }

    .glass-effect {
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    .gradient-text {
        background: linear-gradient(90deg, #4361ee, #3a0ca3);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 700;
    }
</style>