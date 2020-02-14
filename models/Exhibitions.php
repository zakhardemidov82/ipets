<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exhibitions".
 *
 * @property int $id
 * @property string $name
 * @property string $name_trans
 * @property string $date
 * @property string $city
 * @property string $city_trans
 * @property string $rang
 *
 * @property PetExhibition[] $petExhibitions
 */
class Exhibitions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exhibitions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'name_trans', 'date', 'city', 'city_trans', 'rang'], 'required'],
            [['date'], 'safe'],
            [['name', 'name_trans', 'city', 'city_trans'], 'string', 'max' => 255],
            [['rang'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва',
            'name_trans' => 'Назва транслітом',
            'date' => 'Дата виставки',
            'city' => 'Місто',
            'city_trans' => 'Місто транслітом',
            'rang' => 'Ранг',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetExhibitions()
    {
        return $this->hasMany(PetExhibition::className(), ['exhibitionId' => 'id']);
    }
}
