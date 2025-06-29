<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = 'Проект';

?>

<div class="project-view">
    <div class="container py-5">
        <!-- Заголовок проекта -->
        <div class="d-flex justify-content-between align-items-center mb-4 animate-in">
            <div>
                <h1 class="fw-bold text-white"><?= Html::encode($project->title) ?> <span class="gradient-text">Project</span></h1>
                <div class="d-flex align-items-center mt-2">
                    <span class="text-muted me-3">Автор: <?= $project->user->username ?? 'Неизвестен' ?></span>
                    <span class="badge bg-primary glass-effect"><?= Html::encode($project->development_stage) ?></span>
                </div>
            </div>
            <?php if (!Yii::$app->user->isGuest && Yii::$app->user->id == $project->user_id): ?>
                <div class="d-flex gap-2">
                    <?= Html::a('<i class="bi bi-pencil me-1"></i> Обновить', ['update', 'id' => $project->id], [
                        'class' => 'btn btn-outline-primary glass-effect'
                    ]) ?>
                    <?= Html::a('<i class="bi bi-trash me-1"></i> Удалить', ['delete', 'id' => $project->id], [
                        'class' => 'btn btn-danger glass-effect',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить этот проект?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Основной контент -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Описание проекта -->
                <div class="card glass-effect mb-4 animate-in hover-grow">
                    <div class="card-header bg-gradient-primary text-white border-bottom border-primary">
                        <h3 class="fw-bold mb-0"><i class="bi bi-text-paragraph me-2"></i>Описание проекта</h3>
                    </div>
                    <div class="card-body">
                        <div class="description-content p-3 glass-effect rounded">
                            <?= nl2br(Html::encode($project->description)) ?>
                        </div>
                    </div>
                </div>

                <!-- Детали проекта -->
                <div class="card glass-effect mb-4 animate-in delay-1 hover-grow">
                    <div class="card-header bg-gradient-primary text-white border-bottom border-primary">
                        <h3 class="fw-bold mb-0"><i class="bi bi-info-circle me-2"></i>Детали проекта</h3>
                    </div>
                    <div class="card-body">
                        <?= DetailView::widget([
                            'model' => $project,
                            'options' => ['class' => 'table table-dark table-striped detail-view mb-0'],
                            'attributes' => [
                                'genre',
                                'platform',
                                'target_audience',
                                'development_stage',
                                [
                                    'attribute' => 'created_at',
                                    'format' => 'datetime',
                                    'label' => 'Создан'
                                ],
                                [
                                    'attribute' => 'updated_at',
                                    'format' => 'datetime',
                                    'label' => 'Обновлен'
                                ],
                            ],
                        ]) ?>
                    </div>
                </div>

                <!-- Команда проекта -->
                <div class="card glass-effect mb-4 animate-in delay-2 hover-grow">
                    <div class="card-header bg-gradient-primary text-white border-bottom border-primary">
                        <h3 class="fw-bold mb-0"><i class="bi bi-people me-2"></i>Команда проекта</h3>
                    </div>
                    <div class="card-body">
                        <div class="team-members">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 glass-effect">
                                    <?php
                                    $username = $project->user->username ?? '?';
                                    $firstLetter = mb_substr($username, 0, 1);
                                    echo Html::encode($firstLetter);
                                    ?>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-white"><?= $project->user->username ?? 'Неизвестен' ?></h5>
                                    <p class="text-muted mb-0">Руководитель проекта</p>
                                </div>
                            </div>

                            <!-- Примеры участников -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 glass-effect">
                                    A
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-white">Алексей Петров</h5>
                                    <p class="text-muted mb-0">Главный программист</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="avatar bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3 glass-effect">
                                    M
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-white">Мария Иванова</h5>
                                    <p class="text-muted mb-0">Художник</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <?= Html::a('<i class="bi bi-plus-circle me-2"></i> Присоединиться к команде', ['team/create', 'project_id' => $project->id], [
                            'class' => 'btn btn-outline-primary w-100 glass-effect'
                        ]) ?>
                    </div>
                </div>

                <!-- Комментарии -->
                <div class="card glass-effect animate-in delay-3 hover-grow">
                    <div class="card-header bg-gradient-primary text-white border-bottom border-primary">
                        <h3 class="fw-bold mb-0"><i class="bi bi-chat-left-text me-2"></i>Обсуждение проекта</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($comments)): ?>
                            <div class="comments-list">
                                <?php foreach ($comments as $comment): ?>
                                    <div class="comment-card mb-4 pb-4 border-bottom border-primary">
                                        <div class="d-flex justify-content-between mb-2">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-2 glass-effect">
                                                    <?php
                                                    $username = $comment->user->username ?? '?';
                                                    $firstLetter = mb_substr($username, 0, 1);
                                                    echo Html::encode($firstLetter);
                                                    ?>
                                                </div>
                                                <span class="fw-bold text-white"><?= $comment->user->username ?? 'Аноним' ?></span>
                                            </div>
                                            <span class="text-muted"><?= Yii::$app->formatter->asDatetime($comment->created_at) ?></span>
                                        </div>
                                        <p class="mb-0 text-white-80"><?= Html::encode($comment->content) ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="text-muted text-center py-4">Пока нет комментариев. Будьте первым!</p>
                        <?php endif; ?>

                        <?php if (!Yii::$app->user->isGuest): ?>
                            <div class="comment-form mt-4 pt-3 border-top border-primary">
                                <h4 class="h5 mb-3 text-white"><i class="bi bi-pencil me-2"></i>Добавить комментарий</h4>
                                <form action="<?= \yii\helpers\Url::to(['project/add-comment']) ?>" method="post">
                                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                                    <input type="hidden" name="projectId" value="<?= $project->id ?>">

                                    <div class="mb-3">
                                        <textarea name="content" class="form-control glass-effect text-white" rows="3" placeholder="Ваш комментарий..." required></textarea>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary px-4 glass-effect"><i class="bi bi-send me-2"></i>Отправить</button>
                                    </div>
                                </form>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info glass-effect mt-4">
                                <a href="<?= \yii\helpers\Url::to(['site/login']) ?>" class="alert-link fw-bold"><i class="bi bi-box-arrow-in-right me-2"></i>Войдите</a>, чтобы оставлять комментарии
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Боковая панель -->
            <div class="col-lg-4">
                <!-- Финансирование -->
                <div class="card glass-effect mb-4 animate-in delay-1 hover-grow">
                    <div class="card-header bg-gradient-primary text-white border-bottom border-primary">
                        <h3 class="fw-bold mb-0"><i class="bi bi-cash-coin me-2"></i>Финансирование</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <div class="progress mb-3 glass-effect" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                            </div>
                            <h2 class="fw-bold text-success">₽ 32,500</h2>
                            <p class="text-muted">из ₽ 50,000 собрано</p>
                        </div>

                        <div class="d-grid gap-2">
                            <?= Html::a('<i class="bi bi-heart me-2"></i> Поддержать проект', ['donation/create', 'project_id' => $project->id], [
                                'class' => 'btn btn-primary btn-lg py-3 fw-bold glass-effect'
                            ]) ?>
                            <?= Html::a('<i class="bi bi-list-ul me-2"></i> Посмотреть пожертвования', ['donation/index', 'project_id' => $project->id], [
                                'class' => 'btn btn-outline-primary glass-effect'
                            ]) ?>
                        </div>
                    </div>
                </div>

                <!-- Статистика -->
                <div class="card glass-effect mb-4 animate-in delay-2 hover-grow">
                    <div class="card-header bg-gradient-primary text-white border-bottom border-primary">
                        <h3 class="fw-bold mb-0"><i class="bi bi-graph-up me-2"></i>Статистика проекта</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted"><i class="bi bi-eye me-2"></i>Просмотры:</span>
                            <span class="fw-bold text-white">1,245</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted"><i class="bi bi-heart me-2"></i>Лайки:</span>
                            <span class="fw-bold text-white">87</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted"><i class="bi bi-chat-left-text me-2"></i>Комментарии:</span>
                            <span class="fw-bold text-white"><?= count($comments) ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted"><i class="bi bi-people me-2"></i>Участники:</span>
                            <span class="fw-bold text-white">5</span>
                        </div>
                    </div>
                </div>

                <!-- Похожие проекты -->
                <div class="card glass-effect animate-in delay-3 hover-grow">
                    <div class="card-header bg-gradient-primary text-white border-bottom border-primary">
                        <h3 class="fw-bold mb-0"><i class="bi bi-controller me-2"></i>Похожие проекты</h3>
                    </div>
                    <div class="card-body">
                        <div class="similar-projects">
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <div class="glass-effect border border-primary rounded p-2">
                                        <i class="bi bi-controller fs-4 text-primary"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="fw-bold mb-1 text-white">Cyber Nexus</h5>
                                    <p class="text-muted mb-0">RPG, Cyberpunk</p>
                                </div>
                            </div>

                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <div class="glass-effect border border-primary rounded p-2">
                                        <i class="bi bi-controller fs-4 text-primary"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="fw-bold mb-1 text-white">Neon Dreams</h5>
                                    <p class="text-muted mb-0">Action, Sci-Fi</p>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="glass-effect border border-primary rounded p-2">
                                        <i class="bi bi-controller fs-4 text-primary"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="fw-bold mb-1 text-white">Future Wars</h5>
                                    <p class="text-muted mb-0">Strategy, Sci-Fi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <?= Html::a('<i class="bi bi-arrow-right me-2"></i> Все похожие проекты', ['project/index'], [
                            'class' => 'btn btn-outline-primary w-100 glass-effect'
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .avatar {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }

    .description-content {
        background: rgba(67, 97, 238, 0.1);
        border-left: 4px solid #4361ee;
        border-radius: 0 8px 8px 0;
        color: rgba(255, 255, 255, 0.9);
    }

    .comment-card {
        transition: all 0.3s ease;
    }

    .comment-card:hover {
        background: rgba(67, 97, 238, 0.1);
        border-radius: 8px;
        padding: 10px;
        margin-left: -10px;
        margin-right: -10px;
    }

    .table-dark {
        --bs-table-bg: rgba(15, 23, 42, 0.7);
        --bs-table-striped-bg: rgba(67, 97, 238, 0.1);
        --bs-table-hover-bg: rgba(67, 97, 238, 0.2);
        --bs-table-border-color: rgba(67, 97, 238, 0.3);
        color: white;
    }

    .progress {
        background: rgba(15, 23, 42, 0.5);
    }

    .text-white-80 {
        color: rgba(255, 255, 255, 0.8);
    }

    .border-primary {
        border-color: rgba(67, 97, 238, 0.5) !important;
    }
</style>