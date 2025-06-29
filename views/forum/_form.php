<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Topic */

$this->title = 'Создание новой темы';
$this->params['breadcrumbs'][] = ['label' => 'Форум', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .forum-form {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .forum-form h1 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 30px;
        text-align: center;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #e0e6ed;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .btn-success {
        background-color: #4361ee;
        border-color: #4361ee;
        border-radius: 8px;
        padding: 10px 25px;
        font-weight: 500;
        transition: all 0.3s;
        width: 100%;
        margin-top: 10px;
    }

    .btn-success:hover {
        background-color: #3a56d4;
        border-color: #3a56d4;
        transform: translateY(-2px);
    }

    .help-block {
        color: #6c757d;
        font-size: 0.875em;
    }

    .control-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 8px;
    }

    .breadcrumb {
        background-color: transparent;
        padding: 0;
        margin-bottom: 30px;
    }

    textarea.form-control {
        min-height: 200px;
    }
</style>

<div class="forum-form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Введите заголовок темы']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6, 'placeholder' => 'Подробное описание темы']) ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'),
        ['prompt' => 'Выберите категорию']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать тему', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>