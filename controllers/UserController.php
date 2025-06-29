<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'profile'],
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    return Yii::$app->response->redirect(['user/login']);
                },
            ],
        ];
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Вы успешно вошли в систему!');
            return $this->goBack();
        } else {
            $model->password = '';
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    Yii::$app->session->setFlash('success', 'Вы успешно зарегистрировались!');
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success', 'Вы успешно вышли из системы!');
        return $this->goHome();
    }

    public function actionProfile()
    {
        $model = Yii::$app->user->identity;
        $model->scenario = User::SCENARIO_UPDATE; // Устанавливаем сценарий

        if ($model->load(Yii::$app->request->post())) {
            // Если введен новый пароль
            if (!empty($model->newPassword)) {
                $model->setPassword($model->newPassword);
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Профиль успешно обновлен!');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при обновлении профиля: ' . implode(', ', $model->getFirstErrors()));
            }
        }

        // Очищаем поле пароля перед отображением формы
        $model->newPassword = '';

        return $this->render('profile', [
            'model' => $model,
        ]);
    }

}