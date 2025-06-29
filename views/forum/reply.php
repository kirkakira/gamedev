<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="reply-form">
    <h1>Ответ в теме: <?= Html::encode($topic->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('Ваш ответ') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить ответ', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>