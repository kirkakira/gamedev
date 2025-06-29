<?php
// controllers/JobPostingController.php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\JobPosting;

class JobPostingController extends Controller
{
    public function actionIndex()
    {
        $postings = JobPosting::find()->all();
        return $this->render('index', ['postings' => $postings]);
    }

    public function actionCreate()
    {
        $model = new JobPosting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = JobPosting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Вакансия не найдена.');
    }
}