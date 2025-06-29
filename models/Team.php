<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Team extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%team}}';
    }

    public function rules()
    {
        return [
            [['name', 'project_id', 'user_id'], 'required'],
            [['role'], 'string'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название команды',
            'project_id' => 'Проект',
            'role' => 'Роль',
            'user_id' => 'Участник',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }

    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}