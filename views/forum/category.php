<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Категории';
?>

<div class="category-view">
    <div class="category-header">
        <h1 class="category-title"><?= Html::encode($category->name) ?></h1>
        <?= Html::a('Создать новую тему', ['create-topic', 'category_id' => $category->id], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="topics-list">
        <?php foreach ($dataProvider->getModels() as $topic): ?>
            <div class="topic-item panel panel-default">
                <div class="panel-body">
                    <a href="<?= Url::to(['topic', 'id' => $topic->id]) ?>" class="topic-title">
                        <?= Html::encode($topic->title) ?>
                    </a>
                    <div class="topic-meta">
                        <span class="topic-author">Автор: <?= Html::encode($topic->user->username) ?></span>
                        <span class="topic-date"><?= Yii::$app->formatter->asDatetime($topic->created_at) ?></span>
                        <span class="topic-replies">Ответов: <?= count($topic->posts) ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]) ?>
</div>