<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "room_log".
 *
 * @property int $id
 * @property string $checkin
 * @property string $checkout
 * @property int $client_id
 * @property int $room_id
 * @property int $user_id
 *
 * @property User $user
 */
class RoomLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['checkin', 'checkout', 'client_id', 'room_id', 'user_id'], 'required'],
            [['checkin', 'checkout'], 'safe'],
            [['client_id', 'room_id', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'checkin' => 'Checkin',
            'checkout' => 'Checkout',
            'client_id' => 'Client ID',
            'room_id' => 'Room ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
