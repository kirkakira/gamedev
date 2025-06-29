<?php

namespace app\models;

use yii\db\ActiveRecord;

class Topic extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%topic}}';
    }

    public function rules()
    {
        return [
            [['category_id', 'user_id', 'title', 'content'], 'required'],
            [['content'], 'string'],
            [['category_id', 'user_id', 'created_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getPosts()
    {
        return $this->hasMany(Post::class, ['topic_id' => 'id']);
    }
}