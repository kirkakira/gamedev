<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use app\models\Forum;
use app\models\Category;
use app\models\Topic;
use app\models\Post;

class ForumController extends Controller
{
    public function actionIndex()
    {
        $forums = Forum::find()->with('categories')->all();

        return $this->render('index', [
            'forums' => $forums,
        ]);
    }

    public function actionView($id)
    {
        $forum = $this->findForum($id);
        $categories = $forum->getCategories()->with('topics')->all();

        return $this->render('view', [
            'forum' => $forum,
            'categories' => $categories,
        ]);
    }

    public function actionCategory($id)
    {
        $category = $this->findCategory($id);

        $dataProvider = new ActiveDataProvider([
            'query' => Topic::find()
                ->where(['category_id' => $id])
                ->with('user', 'posts')
                ->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('category', [
            'category' => $category,
            'dataProvider' => $dataProvider,
            'topics' => $dataProvider->getModels(), // Добавляем переменную topics
        ]);
    }

    public function actionReply($topic_id)
    {
        $model = new Post();
        $model->topic_id = $topic_id;
        $model->user_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Ответ добавлен!');
                return $this->redirect(['topic', 'id' => $topic_id]);
            }
        }

        return $this->render('reply', [
            'model' => $model,
            'topic' => $this->findTopic($topic_id),
        ]);
    }

    public function actionTopic($id)
    {
        $topic = $this->findTopic($id);

        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()
                ->where(['topic_id' => $id])
                ->with('user')
                ->orderBy(['created_at' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        return $this->render('topic', [
            'topic' => $topic,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateTopic($category_id)
    {
        $model = new Topic();
        $model->category_id = $category_id;
        $model->user_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Тема успешно создана!');
                return $this->redirect(['topic', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при создании темы: ' . implode(', ', $model->getFirstErrors()));
            }
        }

        // Получаем связанные данные для отображения в форме
        $category = Category::findOne($category_id);
        $forum = $category ? Forum::findOne($category->forum_id) : null;

        return $this->render('create-topic', [
            'model' => $model,
            'category' => $category,
            'forum' => $forum,
        ]);
    }

    public function actionCreateCategory($forum_id)
    {
        $model = new Category();
        $model->forum_id = $forum_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Категория успешно создана');
            return $this->redirect(['index']);
        }

        return $this->render('create-category', [
            'model' => $model,
        ]);
    }

    protected function findForum($id)
    {
        if (($model = Forum::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Форум не найден.');
    }

    protected function findCategory($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Категория не найдена.');
    }

    protected function findTopic($id)
    {
        if (($model = Topic::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Тема не найдена.');
    }
    public function actionCreateForum()
    {
        $model = new Forum();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Форум успешно создан');
            return $this->redirect(['index']);
        }

        return $this->render('create-forum', [
            'model' => $model,
        ]);
    }
}