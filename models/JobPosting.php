<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class JobPosting extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%job_posting}}';
    }

    public function rules()
    {
        return [
            [['role', 'project_id'], 'required'],
            [['requirements', 'tasks'], 'string'],
            [['deadline'], 'date'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Позиция',
            'requirements' => 'Требования',
            'tasks' => 'Задачи',
            'deadline' => 'Срок',
            'project_id' => 'Проект',
            'created_at' => 'Дата создания',
        ];
    }

    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}