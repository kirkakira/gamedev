<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $forums app\models\Forum[] */

$this->title = 'Форумы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="forum-index animate-in">
    <div class="container py-5">
        <!-- Заголовок и кнопка создания -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="fw-bold text-white"><?= Html::encode($this->title) ?> <span class="gradient-text">Сообщество</span></h1>
                <p class="text-muted">Обсуждайте разработку игр с коллегами</p>
            </div>
            <?= Html::a('<i class="bi bi-plus-circle me-2"></i> Создать форум', ['create-forum'], [
                'class' => 'btn btn-primary glass-effect hover-grow'
            ]) ?>
        </div>

        <!-- Список форумов -->
        <div class="row g-4">
            <?php foreach ($forums as $forum): ?>
                <div class="col-12 animate-in delay-<?= $forum->id % 3 + 1 ?>">
                    <div class="card glass-effect hover-grow">
                        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center border-bottom border-primary">
                            <div>
                                <h3 class="fw-bold mb-1"><?= Html::encode($forum->name) ?></h3>
                                <?php if ($forum->description): ?>
                                    <p class="mb-0 opacity-75"><?= Html::encode($forum->description) ?></p>
                                <?php endif; ?>
                            </div>
                            <?= Html::a('<i class="bi bi-plus me-2"></i> Категория',
                                ['create-category', 'forum_id' => $forum->id], [
                                    'class' => 'btn btn-outline-light btn-sm glass-effect'
                                ]) ?>
                        </div>
                        <div class="card-body">
                            <?php foreach ($forum->categories as $category): ?>
                                <div class="category-item mb-3 p-3 glass-effect rounded border-primary">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="mb-0">
                                            <?= Html::a(
                                                Html::encode($category->name),
                                                ['category', 'id' => $category->id],
                                                ['class' => 'text-white text-decoration-none hover-underline']
                                            ) ?>
                                            <span class="badge bg-primary glass-effect ms-2">
                                                <?= count($category->topics) ?> тем
                                            </span>
                                        </h4>
                                        <?= Html::a(
                                            '<i class="bi bi-plus-lg me-1"></i> Тема',
                                            ['create-topic', 'category_id' => $category->id], [
                                            'class' => 'btn btn-outline-primary btn-sm glass-effect'
                                        ]) ?>
                                    </div>
                                    <?php if ($category->description): ?>
                                        <p class="mt-2 mb-0 text-white-80"><?= Html::encode($category->description) ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    /* Основные стили */
    .forum-index {
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

    .animate-in.delay-1 { animation-delay: 0.2s; }
    .animate-in.delay-2 { animation-delay: 0.4s; }
    .animate-in.delay-3 { animation-delay: 0.6s; }

    /* Эффекты при наведении */
    .hover-grow {
        transition: all 0.3s ease;
    }

    .hover-grow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
    }

    .hover-underline:hover {
        text-decoration: underline !important;
    }

    /* Границы */
    .border-primary {
        border-color: rgba(67, 97, 238, 0.5) !important;
    }

    /* Текст */
    .text-white-80 {
        color: rgba(255, 255, 255, 0.8);
    }

    .opacity-75 {
        opacity: 0.75;
    }

    /* Кнопки */
    .btn-outline-light {
        color: rgba(255, 255, 255, 0.8);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .btn-outline-light:hover {
        color: #0f172a;
        background-color: rgba(255, 255, 255, 0.9);
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

    .category-item {
        transition: all 0.3s ease;
        background: rgba(67, 97, 238, 0.1);
    }

    .category-item:hover {
        background: rgba(67, 97, 238, 0.2);
    }

    /* Градиентный фон */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
    }
</style>