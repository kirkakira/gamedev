<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Project;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = 'Создание команды';
$this->params['breadcrumbs'][] = ['label' => 'Команды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-create" style="background-color: #0f172a; min-height: 100vh; padding: 20px;">
    <div class="container py-5 animate-in">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="fw-bold text-white"><?= Html::encode($this->title) ?></h1>
                <p class="text-muted">Заполните информацию о новой команде</p>
            </div>
            <?= Html::a('← Назад', ['index'], [
                'class' => 'btn btn-outline-primary glass-effect hover-grow'
            ]) ?>
        </div>

        <div class="card glass-effect p-4 mb-5">
            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'form-dark']
            ]); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name', [
                        'template' => '
                            <div class="mb-4">
                                {label}
                                {input}
                                {error}
                            </div>
                        ',
                        'inputOptions' => [
                            'class' => 'form-control glass-effect',
                            'placeholder' => 'Введите название команды'
                        ],
                        'labelOptions' => ['class' => 'form-label text-white-80 mb-2'],
                    ])->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'role', [
                        'template' => '
                            <div class="mb-4">
                                {label}
                                {input}
                                {error}
                            </div>
                        ',
                        'inputOptions' => [
                            'class' => 'form-control glass-effect',
                            'placeholder' => 'Введите роль команды'
                        ],
                        'labelOptions' => ['class' => 'form-label text-white-80 mb-2'],
                    ])->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'project_id', [
                        'template' => '
                            <div class="mb-4">
                                {label}
                                {input}
                                {error}
                            </div>
                        ',
                        'inputOptions' => [
                            'class' => 'form-control glass-effect',
                        ],
                        'labelOptions' => ['class' => 'form-label text-white-80 mb-2'],
                    ])->dropDownList(
                        ArrayHelper::map(Project::find()->all(), 'id', 'title'),
                        ['prompt' => 'Выберите проект...']
                    ) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'user_id', [
                        'template' => '
                            <div class="mb-4">
                                {label}
                                {input}
                                {error}
                            </div>
                        ',
                        'inputOptions' => [
                            'class' => 'form-control glass-effect',
                        ],
                        'labelOptions' => ['class' => 'form-label text-white-80 mb-2'],
                    ])->dropDownList(
                        ArrayHelper::map(User::find()->all(), 'id', 'username'),
                        ['prompt' => 'Выберите участника...']
                    ) ?>
                </div>
            </div>

            <div class="form-group text-end mt-5">
                <?= Html::submitButton('<i class="bi bi-plus-circle me-2"></i> Создать команду', [
                    'class' => 'btn btn-primary glass-effect hover-grow px-4 py-2'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
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

    .form-control.glass-effect {
        background: rgba(15, 23, 42, 0.5) !important;
        color: white !important;
        border: 1px solid rgba(67, 97, 238, 0.3) !important;
        padding: 12px 15px !important;
        transition: all 0.3s ease;
    }

    .form-control.glass-effect:focus {
        background: rgba(15, 23, 42, 0.8) !important;
        border-color: rgba(67, 97, 238, 0.7) !important;
        box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25) !important;
        color: white !important;
    }

    select.form-control.glass-effect {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%234361ee' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px 12px;
        padding-right: 40px !important;
    }

    .text-white-80 {
        color: rgba(255, 255, 255, 0.8);
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

    .form-label {
        display: block;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .has-error .form-control {
        border-color: #e74c3c !important;
    }

    .help-block {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 5px;
    }
</style>