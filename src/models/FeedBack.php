<?php

namespace common\modules\feedback\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "feed_back".
 *
 * @property int $id
 * @property int $purpose_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $subject
 * @property string|null $content
 * @property string|null $answer
 * @property int|null $created_at
 * @property int|null $user_update
 * @property int|null $updated_at
 *
 * @property User $userUpdate
 */
class FeedBack extends \yii\db\ActiveRecord
{
    public $purpose_list = [1 => 'Задать вопрос', 2 => 'Пожелание', 3 => 'Предложение'];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feed_back';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purpose_id', 'content'], 'required'],
            [['purpose_id', 'created_at', 'user_update', 'updated_at'], 'integer'],
            [['content', 'answer'], 'string'],
            ['email', 'email'],
            [['name', 'email', 'subject'], 'string', 'max' => 255],
            [['user_update'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_update' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'purpose_id' => Yii::t('models', 'Purpose ID'),
            'name' => Yii::t('models', 'Name'),
            'email' => Yii::t('models', 'Email'),
            'subject' => Yii::t('models', 'Subject'),
            'content' => Yii::t('models', 'Content'),
            'answer' => Yii::t('models', 'Answer'),
            'created_at' => Yii::t('models', 'Created At'),
            'user_update' => Yii::t('models', 'User Update'),
            'updated_at' => Yii::t('models', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[UserUpdate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserUpdate()
    {
        return $this->hasOne(User::className(), ['id' => 'user_update']);
    }
}
