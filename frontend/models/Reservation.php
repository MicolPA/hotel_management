<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reservation".
 *
 * @property int $id
 * @property int $room_id
 * @property int $client_id
 * @property int $pleople_count
 * @property int $invoice_id
 * @property int $user_id
 * @property int $status
 * @property string $starting_date
 * @property string $ending_date
 * @property string $cod_register
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Client $client
 * @property Invoice $invoice
 * @property Room $room
 * @property User $user
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'client_id', 'pleople_count', 'invoice_id', 'user_id', 'status', 'starting_date', 'ending_date', 'created_at', 'updated_at'], 'required'],
            [['room_id', 'client_id', 'pleople_count', 'invoice_id', 'user_id', 'status'], 'integer'],
            [['starting_date', 'ending_date', 'created_at', 'updated_at'], 'safe'],
            [['cod_register'], 'string', 'max' => 255],
            [['cod_register'], 'unique'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['invoice_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
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
            'room_id' => 'Room ID',
            'client_id' => 'Client ID',
            'pleople_count' => 'Pleople Count',
            'invoice_id' => 'Invoice ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'starting_date' => 'Starting Date',
            'ending_date' => 'Ending Date',
            'cod_register' => 'Cod Register',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Invoice]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'invoice_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
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
