<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $isAdmin bool */

$this->title = 'Команды';
$this->params['breadcrumbs'][] = $this->title;

// Получаем модели из dataProvider
$teams = $dataProvider->getModels();
?>

<div class="team-index animate-in">
    <div class="container py-5">
        <!-- Заголовок и кнопка создания -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="fw-bold text-white"><?= Html::encode($this->title) ?> <span class="gradient-text">Сообщества</span></h1>
                <p class="text-muted">Найдите идеальную команду для своего проекта или создайте свою</p>
            </div>
            <?= Html::a('<i class="bi bi-plus-circle me-2"></i> Создать команду', ['create'], [
                'class' => 'btn btn-primary glass-effect hover-grow'
            ]) ?>
        </div>

        <!-- Карточки команд -->
        <div class="row g-4">
            <?php foreach ($teams as $team): ?>
                <div class="col-md-6 col-lg-4 animate-in delay-<?= $team->id % 3 + 1 ?>">
                    <div class="card glass-effect hover-grow h-100">
                        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center border-bottom border-primary">
                            <h3 class="fw-bold mb-0"><?= Html::encode($team->name) ?></h3>
                            <?php if ($isAdmin): ?>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-light glass-effect dropdown-toggle" type="button" id="teamActions" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-gear"></i>
                                    </button>
                                    <ul class="dropdown-menu glass-effect" aria-labelledby="teamActions">
                                        <li><?= Html::a('<i class="bi bi-pencil me-2"></i>Редактировать', ['update', 'id' => $team->id], ['class' => 'dropdown-item']) ?></li>
                                        <li><?= Html::a('<i class="bi bi-trash me-2"></i>Удалить', ['delete', 'id' => $team->id], [
                                                'class' => 'dropdown-item text-danger',
                                                'data' => [
                                                    'confirm' => 'Вы уверены, что хотите удалить эту команду?',
                                                    'method' => 'post',
                                                ],
                                            ]) ?></li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    <div class="avatar glass-effect border border-primary rounded-circle p-3">
                                        <i class="bi bi-people-fill fs-4 text-primary"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1"><?= Html::encode($team->project->title ?? 'Не указан') ?></h5>
                                    <span class="badge bg-primary glass-effect"><?= Html::encode($team->role) ?></span>
                                </div>
                            </div>

                            <div class="team-members mb-3">
                                <h6 class="text-white-80 mb-2">Участник:</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge glass-effect">
                                        <?= Html::encode($team->user->username ?? 'Неизвестный') ?>
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-primary">
                                <small class="text-muted">
                                    Создано: <?= Yii::$app->formatter->asDate($team->created_at) ?>
                                </small>
                                <?= Html::a('Подробнее', ['view', 'id' => $team->id], [
                                    'class' => 'btn btn-sm btn-outline-primary glass-effect'
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    .team-index {
        background-color: #0f172a;
        min-height: 100vh;
    }

    .avatar {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .glass-effect {
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(67, 97, 238, 0.2);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    .gradient-text {
        background: linear-gradient(90deg, #4361ee, #3a0ca3);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 700;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
    }

    .border-primary {
        border-color: rgba(67, 97, 238, 0.5) !important;
    }

    .text-white-80 {
        color: rgba(255, 255, 255, 0.8);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    .hover-grow {
        transition: all 0.3s ease;
    }

    .hover-grow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
    }

    .dropdown-menu {
        background: rgba(15, 23, 42, 0.9);
        border: 1px solid rgba(67, 97, 238, 0.3);
    }

    .dropdown-item {
        color: rgba(255, 255, 255, 0.8);
    }

    .dropdown-item:hover {
        background: rgba(67, 97, 238, 0.3);
        color: white;
    }
</style>