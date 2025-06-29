<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $forum app\models\Forum */
/* @var $categories app\models\Category[] */

$this->title = $forum->name;
$this->params['breadcrumbs'][] = ['label' => 'Форумы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .forum-view {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
    }

    .forum-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e0e6ed;
    }

    .forum-title {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .forum-description {
        color: #6c757d;
        font-size: 1.1rem;
        margin-bottom: 20px;
    }

    .create-category-btn {
        background-color: #4361ee;
        border-color: #4361ee;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 500;
        transition: all 0.3s;
        color: white;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 20px;
    }

    .create-category-btn:hover {
        background-color: #3a56d4;
        transform: translateY(-2px);
        color: white;
    }

    .categories-list {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .category-item {
        padding: 20px;
        border-bottom: 1px solid #f1f3f9;
        transition: all 0.2s;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .category-item:hover {
        background-color: #f8f9fa;
    }

    .category-info {
        flex-grow: 1;
    }

    .category-name {
        color: #2c3e50;
        font-weight: 500;
        font-size: 1.2rem;
        margin-bottom: 5px;
        text-decoration: none;
        display: block;
    }

    .category-name:hover {
        color: #4361ee;
    }

    .category-description {
        color: #6c757d;
        font-size: 0.95rem;
        margin-bottom: 10px;
    }

    .category-stats {
        display: flex;
        gap: 15px;
    }

    .stat-item {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .stat-value {
        font-weight: 500;
        color: #4361ee;
    }

    .category-actions {
        display: flex;
        gap: 10px;
    }

    .btn-action {
        padding: 8px 15px;
        border-radius: 6px;
        font-size: 0.9rem;
        transition: all 0.2s;
        text-decoration: none;
    }

    .btn-create-topic {
        background-color: #4361ee;
        color: white;
        border: none;
    }

    .btn-create-topic:hover {
        background-color: #3a56d4;
        color: white;
        transform: translateY(-2px);
    }

    .btn-view-category {
        background-color: #f1f3f9;
        color: #2c3e50;
        border: none;
    }

    .btn-view-category:hover {
        background-color: #e0e6ed;
        color: #2c3e50;
    }
</style>

<div class="forum-view">
    <div class="forum-header">
        <h1 class="forum-title"><?= Html::encode($forum->name) ?></h1>

        <?php if ($forum->description): ?>
            <div class="forum-description">
                <?= Html::encode($forum->description) ?>
            </div>
        <?php endif; ?>

        <?= Html::a('<i class="bi bi-plus-circle"></i> Создать категорию',
            ['create-category', 'forum_id' => $forum->id],
            ['class' => 'create-category-btn']
        ) ?>
    </div>

    <div class="categories-list">
        <?php if (empty($categories)): ?>
            <div class="category-item">
                <div class="text-center py-5">
                    <p class="text-muted">В этом форуме пока нет категорий</p>
                    <?= Html::a('Создать первую категорию',
                        ['create-category', 'forum_id' => $forum->id],
                        ['class' => 'btn btn-primary']
                    ) ?>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($categories as $category): ?>
                <div class="category-item">
                    <div class="category-info">
                        <a href="<?= Url::to(['category', 'id' => $category->id]) ?>" class="category-name">
                            <?= Html::encode($category->name) ?>
                        </a>

                        <?php if ($category->description): ?>
                            <div class="category-description">
                                <?= Html::encode($category->description) ?>
                            </div>
                        <?php endif; ?>

                        <div class="category-stats">
                            <div class="stat-item">
                                Тем: <span class="stat-value"><?= $category->topicsCount ?></span>

                            </div>
                            <div class="stat-item">
                                Сообщений: <span class="stat-value"><?= $category->getTotalPosts() ?></span>
                            </div>
                            <div class="stat-item">
                                Последнее:
                                <span class="stat-value">
                                    <?php if ($lastTopic = $category->lastTopic): ?>
                                        <?= Yii::$app->formatter->asRelativeTime($lastTopic->created_at) ?>
                                    <?php else: ?>
                                        нет
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="category-actions">
                        <?= Html::a('Просмотр',
                            ['category', 'id' => $category->id],
                            ['class' => 'btn-action btn-view-category']
                        ) ?>
                        <?= Html::a('Создать тему',
                            ['create-topic', 'category_id' => $category->id],
                            ['class' => 'btn-action btn-create-topic']
                        ) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>