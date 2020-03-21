<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property int $people_capacity
 * @property int $bed
 * @property string|null $bed_description
 * @property int $bathroom
 * @property string|null $description
 * @property int $status_id
 * @property int $type_id
 *
 * @property Reservation[] $reservations
 * @property RoomStatus $status
 * @property Invoice $type
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people_capacity', 'bed', 'bathroom', 'status_id', 'type_id'], 'required'],
            [['people_capacity', 'bed', 'bathroom', 'status_id', 'type_id'], 'integer'],
            [['bed_description', 'description'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoomStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'people_capacity' => 'People Capacity',
            'bed' => 'Bed',
            'bed_description' => 'Bed Description',
            'bathroom' => 'Bathroom',
            'description' => 'Description',
            'status_id' => 'Status ID',
            'type_id' => 'Type ID',
        ];
    }

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['room_id' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(RoomStatus::className(), ['id' => 'status_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'type_id']);
    }
}
