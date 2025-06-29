<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = 'Проекты';
?>

<div class="project-index">
    <div class="container py-5">
        <!-- Заголовок и кнопка создания -->
        <div class="d-flex justify-content-between align-items-center mb-5 animate-in">
            <div>
                <h1 class="fw-bold mb-2 text-white">Каталог <span class="gradient-text">проектов</span></h1>
                <p class="lead text-muted mb-0">Исследуйте игры, созданные нашим сообществом</p>
            </div>
            <?= Html::a('<i class="bi bi-plus-circle me-2"></i> Создать проект', ['create'], [
                'class' => 'btn btn-primary btn-lg px-4 py-3 hover-grow glass-effect'
            ]) ?>
        </div>

        <!-- Фильтры и поиск -->
        <div class="row mb-5 animate-in delay-1">
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-text glass-effect border-end-0">
                        <i class="bi bi-search text-white"></i>
                    </span>
                    <input type="text" class="form-control glass-effect border-start-0 ps-0 text-white" placeholder="Поиск проектов...">
                    <button class="btn btn-primary px-4 glass-effect">Найти</button>
                </div>
            </div>
            <div class="col-md-4 mt-3 mt-md-0">
                <select class="form-select glass-effect text-white">
                    <option selected>Все жанры</option>
                    <option>RPG</option>
                    <option>Шутер</option>
                    <option>Стратегия</option>
                    <option>Приключения</option>
                    <option>Головоломка</option>
                </select>
            </div>
        </div>

        <!-- Сетка проектов -->
        <div class="row g-4">
            <?php
            $counter = 0;
            foreach ($dataProvider->getModels() as $project):
                $delay = ($counter % 3) + 1;
                $counter++;
                ?>
                <div class="col-md-6 col-lg-4 animate-in delay-<?= $delay ?>">
                    <div class="card h-100 glass-effect hover-grow">
                        <div class="card-header bg-gradient-primary text-white py-3 border-bottom border-primary">
                            <h3 class="fw-bold mb-0"><?= Html::encode($project->title) ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <div class="glass-effect border border-primary rounded p-2">
                                        <i class="bi bi-controller fs-1 text-primary"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="mb-2">
                                        <?php
                                        $genres = explode(',', $project->genre);
                                        foreach ($genres as $genre):
                                            ?>
                                            <span class="badge bg-primary me-1 mb-1 glass-effect"><?= trim($genre) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <p class="mb-0 text-truncate-2 text-white-80"><?= Html::encode($project->description) ?></p>
                                </div>
                            </div>

                            <div class="project-meta d-flex justify-content-between mt-4 pt-3 border-top border-primary">
                                <div>
                                    <span class="text-muted"><i class="bi bi-people me-1"></i> 5 участников</span>
                                </div>
                                <div>
                                    <span class="text-muted"><i class="bi bi-star-fill text-warning me-1"></i> 4.8</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between pt-0">
                            <?= Html::a('Подробнее', ['view', 'id' => $project->id], [
                                'class' => 'btn btn-outline-primary glass-effect'
                            ]) ?>
                            <div class="text-muted">
                                <small><?= Yii::$app->formatter->asDate($project->created_at) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Пагинация -->
        <div class="mt-5 animate-in">
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
    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 2.8em;
        line-height: 1.4em;
    }

    .hover-grow {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-grow:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .text-white-80 {
        color: rgba(255, 255, 255, 0.8);
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
    }

    .border-primary {
        border-color: rgba(67, 97, 238, 0.5) !important;
    }

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