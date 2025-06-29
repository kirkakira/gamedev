<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = 'Форумы';
?>

<div class="topic-view animate-in">
    <div class="container py-5">
        <!-- Заголовок темы -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="fw-bold text-white"><?= Html::encode($topic->title) ?> <span class="gradient-text">Discussion</span></h1>
                <p class="text-muted">Обсуждение в сообществе GameDev</p>
            </div>
            <?= Html::a('<i class="bi bi-reply me-2"></i> Ответить', ['reply', 'topic_id' => $topic->id], [
                'class' => 'btn btn-primary glass-effect hover-grow'
            ]) ?>
        </div>

        <!-- Основное сообщение -->
        <div class="card glass-effect mb-5 hover-grow">
            <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center border-bottom border-primary">
                <div>
                    <h3 class="fw-bold mb-0"><?= Html::encode($topic->title) ?></h3>
                </div>
                <div class="text-white-80">
                    <i class="bi bi-person me-1"></i><?= $topic->user->username ?>
                </div>
            </div>
            <div class="card-body">
                <div class="topic-content text-white-80">
                    <?= nl2br(Html::encode($topic->content)) ?>
                </div>
                <div class="topic-meta mt-4 pt-3 border-top border-primary text-muted">
                    <small><i class="bi bi-clock me-1"></i><?= date('d M Y H:i', $topic->created_at) ?></small>
                </div>
            </div>
        </div>

        <!-- Ответы -->
        <h2 class="fw-bold text-white mb-4"><i class="bi bi-chat-left-text me-2"></i>Ответы <span class="badge bg-primary glass-effect"><?= $dataProvider->totalCount ?></span></h2>

        <?php foreach ($dataProvider->getModels() as $post): ?>
            <div class="card glass-effect mb-4 animate-in delay-<?= $post->id % 3 + 1 ?> hover-grow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center glass-effect" style="width: 64px; height: 64px;">
                                <?= mb_substr($post->user->username, 0, 1) ?>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="fw-bold mb-0 text-white"><?= $post->user->username ?></h4>
                                <small class="text-muted"><i class="bi bi-clock me-1"></i><?= date('d M Y H:i', $post->created_at) ?></small>
                            </div>
                            <div class="post-content text-white-80">
                                <?= nl2br(Html::encode($post->content)) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Пагинация -->
        <div class="mt-5">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'options' => ['class' => 'pagination justify-content-center'],
                'linkContainerOptions' => ['class' => 'page-item'],
                'linkOptions' => ['class' => 'page-link glass-effect'],
                'activePageCssClass' => 'active',
                'prevPageLabel' => '<i class="bi bi-chevron-left"></i>',
                'nextPageLabel' => '<i class="bi bi-chevron-right"></i>',
            ]) ?>
        </div>
    </div>
</div>

<style>
    /* Основные стили */
    .topic-view {
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

    /* Границы */
    .border-primary {
        border-color: rgba(67, 97, 238, 0.5) !important;
    }

    /* Текст */
    .text-white-80 {
        color: rgba(255, 255, 255, 0.8);
    }

    .text-muted {
        color: rgba(255, 255, 255, 0.6) !important;
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

    /* Аватар */
    .avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.5rem;
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

    /* Пагинация */
    .page-link {
        background: rgba(15, 23, 42, 0.5);
        border: 1px solid rgba(67, 97, 238, 0.3);
        color: white;
        margin: 0 5px;
        border-radius: 8px !important;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        border-color: #4361ee;
    }

    .page-link:hover {
        background: rgba(67, 97, 238, 0.3);
        color: white;
    }
</style>