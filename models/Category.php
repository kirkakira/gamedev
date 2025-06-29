<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function rules()
    {
        return [
            [['forum_id', 'name'], 'required'],
            [['description'], 'string'],
            [['forum_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }
    public function getTotalPosts()
    {
        $topicIds = $this->getTopics()->select('id')->column();
        return Post::find()->where(['topic_id' => $topicIds])->count();
    }
    public function getLastTopic()
    {
        return $this->getTopics()
            ->orderBy(['created_at' => SORT_DESC])
            ->one();
    }
    public function getTopicsCount()
    {
        return $this->getTopics()->count();
    }

    public function getForum()
    {
        return $this->hasOne(Forum::class, ['id' => 'forum_id']);
    }

    public function getTopics()
    {
        return $this->hasMany(Topic::class, ['category_id' => 'id']);
    }
}