<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="donation-card glass-effect rounded-lg border border-gray-700 hover:border-blue-500 transition-all duration-300">
    <div class="p-5">
        <div class="flex justify-between items-start mb-4">
            <div>
                <div class="text-sm text-blue-400 font-medium mb-1">Пожертвование #<?= $model->id ?></div>
                <div class="text-2xl font-bold text-white">
                    ₽<?= number_format($model->amount, 2) ?>
                </div>
            </div>

            <div class="bg-blue-900/20 rounded-lg px-3 py-1 text-blue-300 text-sm">
                <?= Yii::$app->formatter->asDate($model->created_at, 'php:d M Y') ?>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-5">
            <div>
                <div class="text-xs text-gray-400 mb-1">Проект</div>
                <div class="font-medium text-white">
                    <?= $model->project
                        ? Html::a($model->project->title, ['project/view', 'id' => $model->project->id], [
                            'class' => 'text-blue-400 hover:text-blue-300 transition'
                        ])
                        : '<span class="text-gray-500">—</span>' ?>
                </div>
            </div>

            <div>
                <div class="text-xs text-gray-400 mb-1">Пользователь</div>
                <div class="font-medium text-white">
                    <?= $model->user
                        ? Html::a($model->user->username, ['user/profile'], [
                            'class' => 'text-purple-400 hover:text-purple-300 transition'
                        ])
                        : '<span class="text-gray-500">Гость</span>' ?>
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-gray-800">
            <div class="text-xs text-gray-400 mb-2">Вознаграждение</div>
            <div class="text-sm text-white">
                <?= $model->reward ? Html::encode($model->reward) : '<span class="text-gray-500">Не указано</span>' ?>
            </div>
        </div>


    </div>
</div>

<style>
    .donation-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .donation-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #4361ee, #3a0ca3);
        opacity: 0.7;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .donation-card:hover::before {
        transform: scaleX(1);
    }

    .donation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
</style>