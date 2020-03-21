<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property int $subtotal
 * @property int $total
 * @property int $payment_type
 * @property int $paid
 * @property int $user_id
 * @property string|null $date
 *
 * @property User $user
 * @property Reservation[] $reservations
 * @property Room[] $rooms
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subtotal', 'total', 'payment_type', 'paid', 'user_id'], 'required'],
            [['subtotal', 'total', 'payment_type', 'paid', 'user_id'], 'integer'],
            [['date'], 'safe'],
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
            'subtotal' => 'Subtotal',
            'total' => 'Total',
            'payment_type' => 'Payment Type',
            'paid' => 'Paid',
            'user_id' => 'User ID',
            'date' => 'Date',
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
        return $this->hasMany(Reservation::className(), ['invoice_id' => 'id']);
    }

    /**
     * Gets query for [[Rooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['type_id' => 'id']);
    }
}
