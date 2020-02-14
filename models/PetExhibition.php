<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_exhibition".
 *
 * @property int $petId
 * @property int $exhibitionId
 *
 * @property Pet $pet
 * @property Exhibitions $exhibition
 */
class PetExhibition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pet_exhibition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['petId', 'exhibitionId'], 'required'],
            [['petId', 'exhibitionId'], 'integer'],
            /*[['petId'], 'exist', 'skipOnError' => true, 'targetClass' => Pet::className(), 'targetAttribute' => ['petId' => 'id']],
            [['exhibitionId'], 'exist', 'skipOnError' => true, 'targetClass' => Exhibitions::className(), 'targetAttribute' => ['exhibitionId' => 'id']],*/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'petId' => 'Оберіть собаку з випадаючого списку',
            'exhibitionId' => 'Exhibition ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPet()
    {
        return $this->hasOne(Pet::className(), ['id' => 'petId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExhibition()
    {
        return $this->hasOne(Exhibitions::className(), ['id' => 'exhibitionId']);
    }
}
