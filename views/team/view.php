<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Команды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-view" style="background-color: #0f172a; min-height: 100vh; padding: 20px;">
    <div class="container py-5 animate-in">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="fw-bold text-white"><?= Html::encode($this->title) ?></h1>
                <p class="text-muted">Просмотр деталей команды</p>
            </div>
            <div>
                <?= Html::a('Обновить', ['update', 'id' => $model->id], [
                    'class' => 'btn btn-primary glass-effect hover-grow me-2'
                ]) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger glass-effect hover-grow',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить эту команду?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="card glass-effect p-4 mb-5">
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-dark'],
                'attributes' => [
                    [
                        'attribute' => 'name',
                        'label' => 'Название команды',
                        'contentOptions' => ['class' => 'glass-effect']
                    ],
                    [
                        'attribute' => 'project.title',
                        'label' => 'Проект',
                        'contentOptions' => ['class' => 'glass-effect']
                    ],
                    [
                        'attribute' => 'role',
                        'label' => 'Роль',
                        'contentOptions' => ['class' => 'glass-effect']
                    ],
                    [
                        'attribute' => 'user.username',
                        'label' => 'Участник',
                        'contentOptions' => ['class' => 'glass-effect']
                    ],
                    [
                        'attribute' => 'created_at',
                        'label' => 'Дата создания',
                        'format' => 'datetime',
                        'contentOptions' => ['class' => 'glass-effect']
                    ],
                    [
                        'attribute' => 'updated_at',
                        'label' => 'Дата обновления',
                        'format' => 'datetime',
                        'contentOptions' => ['class' => 'glass-effect']
                    ],
                ],
            ]) ?>
        </div>

        <div class="d-flex justify-content-between">
            <?= Html::a('← Назад к списку', ['index'], [
                'class' => 'btn btn-outline-primary glass-effect hover-grow'
            ]) ?>

            <div>
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], [
                    'class' => 'btn btn-primary glass-effect hover-grow me-2'
                ]) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger glass-effect hover-grow',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить эту команду?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

<style>
    .glass-effect {
        background: rgba(15, 23, 42, 0.7) !important;
        backdrop-filter: blur(10px) !important;
        -webkit-backdrop-filter: blur(10px) !important;
        border: 1px solid rgba(67, 97, 238, 0.2) !important;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1) !important;
        color: rgba(255, 255, 255, 0.9) !important;
        border-radius: 12px !important;
    }

    .team-view h1 {
        color: white;
    }

    .table-dark {
        --bs-table-bg: transparent;
        --bs-table-striped-bg: rgba(67, 97, 238, 0.1);
        --bs-table-hover-bg: rgba(67, 97, 238, 0.2);
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table-dark th {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        border: none !important;
    }

    .table-dark td {
        background: rgba(15, 23, 42, 0.5);
        vertical-align: middle;
        border: none !important;
    }

    .table > :not(caption) > * > * {
        padding: 1rem 1.5rem;
    }

    .hover-grow {
        transition: all 0.3s ease;
    }

    .hover-grow:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
    }

    .gradient-text {
        background: linear-gradient(90deg, #4361ee, #3a0ca3);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 700;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    .card {
        border: 1px solid rgba(67, 97, 238, 0.3);
        border-radius: 15px;
        overflow: hidden;
    }
</style>