<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $identity
 * @property int $user_id
 * @property string|null $date
 * @property string|null $address
 * @property string $phone
 * @property int|null $foreign
 *
 * @property User $user
 * @property Reservation[] $reservations
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'last_name', 'identity', 'user_id', 'phone'], 'required'],
            [['user_id', 'foreign'], 'integer'],
            [['date'], 'safe'],
            [['name', 'last_name', 'identity', 'address', 'phone'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'last_name' => 'Last Name',
            'identity' => 'Identity',
            'user_id' => 'User ID',
            'date' => 'Date',
            'address' => 'Address',
            'phone' => 'Phone',
            'foreign' => 'Foreign',
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

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['client_id' => 'id']);
    }
}
