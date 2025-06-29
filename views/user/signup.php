
<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
$this->title = 'Регистрация';

/* @var $this yii\web\View */
/* @var $model app\models\SignupForm */
?>

<div class="user-signup">
    <section class="signup-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="signup-card card border-0 shadow-lg animate-in">
                        <div class="card-header bg-gradient-primary text-white text-center py-4">
                            <div class="game-icon mx-auto mb-3">
                                <i class="bi bi-person-plus"></i>
                            </div>
                            <h1 class="fw-bold mb-0">Регистрация аккаунта</h1>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            <p class="text-center text-muted mb-4">Создайте аккаунт для доступа ко всем возможностям платформы</p>

                            <?php $form = ActiveForm::begin([
                                'id' => 'form-signup',
                                'options' => ['class' => 'signup-form']
                            ]); ?>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <?= $form->field($model, 'username', [
                                        'inputTemplate' => '<div class="input-group"><span class="input-group-text bg-light border-end-0"><i class="bi bi-person-badge"></i></span>{input}</div>'
                                    ])->textInput([
                                        'autofocus' => true,
                                        'class' => 'form-control border-start-0 ps-0',
                                        'placeholder' => 'Придумайте логин'
                                    ])->label('Логин') ?>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <?= $form->field($model, 'email', [
                                        'inputTemplate' => '<div class="input-group"><span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope"></i></span>{input}</div>'
                                    ])->textInput([
                                        'class' => 'form-control border-start-0 ps-0',
                                        'placeholder' => 'Ваш email'
                                    ])->label('Email') ?>
                                </div>
                            </div>

                            <div class="mb-4">
                                <?= $form->field($model, 'password', [
                                    'inputTemplate' => '<div class="input-group"><span class="input-group-text bg-light border-end-0"><i class="bi bi-key"></i></span>{input}</div>'
                                ])->passwordInput([
                                    'class' => 'form-control border-start-0 ps-0',
                                    'placeholder' => 'Придумайте пароль'
                                ])->label('Пароль')->hint('Минимум 6 символов', ['class' => 'form-text text-muted']) ?>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                    <label class="form-check-label" for="termsCheck">
                                        Я согласен с <a href="#" class="text-decoration-none">условиями использования</a> и <a href="#" class="text-decoration-none">политикой конфиденциальности</a>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <?= Html::submitButton('<i class="bi bi-person-check me-2"></i> Зарегистрироваться', [
                                    'class' => 'btn btn-primary w-100 py-3 fw-bold',
                                    'name' => 'signup-button',
                                    'id' => 'signup-btn'
                                ]) ?>
                            </div>

                            <div class="social-login mb-4">
                                <div class="social-title position-relative text-center mb-4">
                                    <span class="px-3 bg-white position-relative">Или зарегистрируйтесь через</span>
                                </div>

                                <div class="social-buttons d-flex justify-content-center gap-3">
                                    <a href="#" class="social-btn btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-google"></i>
                                    </a>
                                    <a href="#" class="social-btn btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="social-btn btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-github"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="login-link text-center pt-3 border-top">
                                <p class="mb-0">Уже есть аккаунт? <?= Html::a('Войдите сейчас', ['/user/login'], [
                                        'class' => 'fw-bold text-decoration-none'
                                    ]) ?></p>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const signupBtn = document.getElementById('signup-btn');
        const authAlert = document.createElement('div');

        // Создаем элемент уведомления
        authAlert.id = 'auth-alert';
        authAlert.className = 'auth-alert alert alert-success';
        authAlert.innerHTML = '<i class="bi bi-check-circle me-2"></i> Вы успешно зарегистрировались!';
        document.body.appendChild(authAlert);

        if (signupBtn) {
            signupBtn.addEventListener('click', function(e) {
                // Показываем уведомление через 1 секунду (имитация успешной регистрации)
                setTimeout(function() {
                    authAlert.classList.add('show');

                    // Скрываем уведомление через 5 секунд
                    setTimeout(function() {
                        authAlert.classList.remove('show');
                    }, 5000);
                }, 1000);
            });
        }
    });
</script>
