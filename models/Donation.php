<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "donation".
 *
 * @property int $id
 * @property float $amount
 * @property string $date
 * @property int $user_id
 * @property int $project_id
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $reward
 *
 * @property Project $project
 * @property User $user
 */
class Donation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%donation}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'date', 'user_id', 'project_id'], 'required'],
            [['amount'], 'number'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['user_id', 'project_id'], 'integer'],
            [['reward'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['project_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'date' => 'Date',
            'user_id' => 'User ID',
            'project_id' => 'Project ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'reward' => 'Reward',
        ];
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::class, ['id' => 'project_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function isOwner($userId)
    {
        return $this->user_id == $userId;
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->created_at = date('Y-m-d H:i:s');
            }
            $this->updated_at = date('Y-m-d H:i:s');

            // Преобразуем дату в правильный формат
            $this->date = date('Y-m-d', strtotime($this->date));

            return true;
        }
        return false;
    }
}