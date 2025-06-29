<?php
use yii\helpers\Html;
use yii\widgets\ListView;
$this->title = 'Финансирование';
?>

<div class="donation-index" style="background: linear-gradient(135deg, #0f172a, #1e293b); min-height: 100vh; padding: 20px;">
    <div class="container py-8 px-4 mx-auto max-w-7xl">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-3xl font-bold text-white">Пожертвования <span class="gradient-text">Сообщества</span></h1>
                <p class="mt-2 text-gray-400">История поддержки игровых проектов</p>
            </div>
            <?= Html::a('Создать пожертвование', ['create'], [
                'class' => 'btn-primary flex items-center gap-2 py-3 px-6 rounded-lg font-medium transition-all hover:no-underline'
            ]) ?>
        </div>

        <div class="glass-effect rounded-xl overflow-hidden border border-primary">
            <div class="bg-gradient-primary px-6 py-4">
                <h2 class="text-xl font-semibold text-white">Список пожертвований</h2>
            </div>

            <div class="p-4">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => "{items}\n<div class='pagination-container mt-6'>{pager}</div>",
                    'itemView' => '_donation_card',
                    'options' => ['class' => 'donation-cards-grid'],
                    'itemOptions' => ['class' => 'donation-card-wrapper'],
                    'emptyText' => '<div class="text-center py-12 px-4">
                        <div class="bg-gray-900/50 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-white">Пожертвований пока нет</h3>
                        <p class="mt-2 text-gray-400">Будьте первым, кто поддержит проект</p>
                        <div class="mt-6">
                            '.Html::a('Создать пожертвование', ['create'], [
                            'class' => 'btn-primary inline-flex items-center py-2.5 px-6 rounded-lg font-medium hover:no-underline'
                        ]).'
                        </div>
                    </div>'
                ]); ?>
            </div>
        </div>
    </div>
</div>

<style>
    .donation-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
    }

    .glass-effect {
        background: rgba(15, 23, 42, 0.75) !important;
        backdrop-filter: blur(12px) !important;
        -webkit-backdrop-filter: blur(12px) !important;
        border: 1px solid rgba(67, 97, 238, 0.25) !important;
        box-shadow: 0 6px 35px rgba(0, 0, 0, 0.2) !important;
        color: rgba(255, 255, 255, 0.95) !important;
        border-radius: 14px !important;
    }

    .gradient-text {
        background: linear-gradient(90deg, #4361ee, #3a0ca3);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 700;
    }

    .btn-primary {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white !important;
        border: 1px solid rgba(67, 97, 238, 0.6);
        box-shadow: 0 5px 10px rgba(67, 97, 238, 0.25);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(67, 97, 238, 0.35);
        background: linear-gradient(135deg, #4d6df1, #4510c2);
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
    }

    .border-primary {
        border-color: rgba(67, 97, 238, 0.6) !important;
    }

    .donation-index .pagination {
        display: flex;
        justify-content: center;
        padding: 1.5rem 1rem;
    }

    .donation-index .pagination li {
        margin: 0 4px;
    }

    .donation-index .pagination li a {
        display: inline-block;
        padding: 8px 16px;
        background: rgba(15, 23, 42, 0.6);
        color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        border: 1px solid rgba(67, 97, 238, 0.4);
        transition: all 0.3s ease;
        font-size: 15px;
    }

    .donation-index .pagination li a:hover {
        background: rgba(67, 97, 238, 0.4);
        transform: translateY(-2px);
        box-shadow: 0 3px 8px rgba(67, 97, 238, 0.2);
    }

    .donation-index .pagination li.active a {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        font-weight: bold;
        box-shadow: 0 3px 8px rgba(67, 97, 238, 0.3);
    }

    .donation-index .pagination li.disabled a {
        background: rgba(15, 23, 42, 0.3);
        color: rgba(255, 255, 255, 0.3);
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    @media (max-width: 768px) {
        .donation-cards-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }
    }
</style>