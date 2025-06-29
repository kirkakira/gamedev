<?php
// controllers/SiteController.php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    } public function actionContact()
    {
        return $this->render('contact');
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
}