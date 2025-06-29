<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error glass-effect animate-in">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Ошибка произошла при обработке вашего запроса. Пожалуйста, попробуйте снова позже.
    </p>

    <p>
        Если вы считаете, что это ошибка на стороне сервера, пожалуйста, свяжитесь с нами.
    </p>
</div>