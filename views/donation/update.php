<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Project;

$this->title = 'Редактирование пожертвования #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пожертвования', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="donation-update">
    <div class="max-w-3xl mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 py-6 px-8">
                <h1 class="text-2xl font-bold text-white"><?= Html::encode($this->title) ?></h1>
                <p class="text-blue-100 mt-1">Обновите информацию о пожертвовании</p>
            </div>

            <div class="p-8">
                <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'block text-sm font-medium text-gray-700 mb-1'],
                        'inputOptions' => ['class' => 'w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150'],
                        'errorOptions' => ['class' => 'mt-1 text-sm text-red-600']
                    ],
                ]); ?>

                <div class="space-y-6">
                    <!-- Amount Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Сумма пожертвования</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 font-medium">₽</span>
                            </div>
                            <?= $form->field($model, 'amount', [
                                'template' => "{input}\n{error}",
                                'inputOptions' => [
                                    'class' => 'pl-10 pr-4 py-3 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150',
                                    'type' => 'number',
                                    'step' => '0.01',
                                    'min' => '1'
                                ]
                            ])->textInput()->label(false) ?>
                        </div>
                    </div>

                    <!-- Reward Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Вознаграждение</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                </svg>
                            </div>
                            <?= $form->field($model, 'reward')->textInput([
                                'maxlength' => true,
                                'class' => 'pl-10'
                            ])->label(false) ?>
                        </div>
                    </div>

                    <!-- Date Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Дата пожертвования</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                </svg>
                            </div>
                            <?= $form->field($model, 'date')->textInput([
                                'type' => 'date',
                                'class' => 'pl-10'
                            ])->label(false) ?>
                        </div>
                    </div>

                    <!-- Project Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Проект</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <?= $form->field($model, 'project_id', [
                                'template' => "{input}\n{error}",
                            ])->dropDownList(
                                ArrayHelper::map(Project::find()->all(), 'id', 'title'),
                                [
                                    'class' => 'pl-10 appearance-none w-full py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150'
                                ]
                            )->label(false) ?>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4 flex space-x-4">
                        <?= Html::submitButton('Сохранить изменения', [
                            'class' => 'flex-1 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-medium py-3 px-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500'
                        ]) ?>

                        <?= Html::a('Отмена', ['index'], [
                            'class' => 'flex-1 bg-white border border-gray-300 text-gray-700 font-medium py-3 px-4 rounded-lg shadow-sm hover:bg-gray-50 transform hover:-translate-y-0.5 transition duration-300 ease-in-out text-center'
                        ]) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>