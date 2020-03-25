<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "room_type".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $initials
 * @property int|null $price_per_night
 *
 * @property Room[] $rooms
 */
class RoomType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['price_per_night'], 'integer'],
            [['name', 'initials'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tipo',
            'description' => 'Descripción',
            'initials' => 'Siglas',
            'price_per_night' => 'P/P/N',
        ];
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
