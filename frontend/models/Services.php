<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int|null $status
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Reservation[] $reservations
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'price'], 'required'],
            [['price', 'status'], 'integer'],
            [['name','description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'price' => 'Precio',
            'status' => 'Estado',
            'description' => 'Descripción',
        ];
    }

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['service_id' => 'id']);
    }
}
