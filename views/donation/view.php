<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Donation */

$this->title = 'Пожертвование #' . $model->id;
?>
<div class="donation-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="donation-details">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'amount',
                'date',
                [
                    'attribute' => 'project_id',
                    'value' => $model->project->title ?? 'Не указан',
                ],
                'reward',
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>

    <div class="actions">
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-default']) ?>
    </div>
</div>