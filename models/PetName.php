<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_name".
 *
 * @property int $id
 * @property string $name
 */
class PetName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pet_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'name_trans'], 'required'],
            [['name', 'name_trans'], 'string', 'max' => 255],
            [['ownerId'], 'default', 'value' => 0],
            [['clubId'], 'default', 'value' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Кличка собаки',
            'name_trans' => 'Кличка транслітом',
            'ownerId' => ' ',
        ];
    }
    public function getPets()
    {
        return $this->hasMany(Pet::className(), ['nameId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Owner::className(), ['id' => 'ownerId']);
    }
}
