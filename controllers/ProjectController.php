<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Project;
use app\models\Comment;
use yii\data\ActiveDataProvider;

class ProjectController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Project::find()->with('user'),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $project = $this->findModel($id);
        $comments = Comment::find()->where(['project_id' => $id])->all();

        return $this->render('view', [
            'project' => $project,
            'comments' => $comments
        ]);
    }

    public function actionCreate()
    {
        $model = new Project();
        $model->user_id = Yii::$app->user->id; // Фикс: устанавливаем user_id

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Проект успешно создан!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Проверка, является ли пользователь автором проекта
        if (Yii::$app->user->isGuest || Yii::$app->user->id != $model->user_id) {
            Yii::$app->session->setFlash('error', 'Вы не можете редактировать чужой проект!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Проект успешно обновлен!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // Проверка, является ли пользователь автором проекта
        if (Yii::$app->user->isGuest || Yii::$app->user->id != $model->user_id) {
            Yii::$app->session->setFlash('error', 'Вы не можете удалить чужой проект!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $model->delete();
        Yii::$app->session->setFlash('success', 'Проект успешно удален!');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Проект не найден.');
    }
}