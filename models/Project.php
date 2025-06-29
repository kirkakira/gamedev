<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Project extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%project}}';
    }

    public function rules()
    {
        return [
            [['title', 'user_id'], 'required'],
            [['description'], 'safe'],
            [['genre', 'platform', 'target_audience', 'development_stage'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'genre' => 'Жанр',
            'platform' => 'Платформа',
            'target_audience' => 'Целевая аудитория',
            'development_stage' => 'Этап разработки',
            'user_id' => 'Автор',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}