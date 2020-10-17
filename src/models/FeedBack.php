<?php

namespace itshkacomua\feedback\models;

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
    public $verifyCode;

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
            [['name', 'email', 'subject', 'phone'], 'string', 'max' => 255],
            [['user_update'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_update' => 'id']],
            ['verifyCode', 'captcha'],
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
            'phone' => Yii::t('models', 'Phone'),
            'subject' => Yii::t('models', 'Subject'),
            'content' => Yii::t('models', 'Content'),
            'answer' => Yii::t('models', 'Answer'),
            'created_at' => Yii::t('models', 'Created At'),
            'user_update' => Yii::t('models', 'User Update'),
            'updated_at' => Yii::t('models', 'Updated At'),
            'verifyCode' => 'Verification Code',
        ];
    }

    public function getPurposeList()
    {
        return [
            "1" => Yii::t('models', 'Ask a Question'),
            "2" => Yii::t('models', 'Wish'),
            "3" => Yii::t('models', 'Sentence')
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

    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->purposeList[$this->purpose_id] . ' ' . $this->subject)
            ->setTextBody($this->content)
            ->send();
    }
}
