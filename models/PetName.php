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
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['ownerId'], 'default', 'value' => 0],
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
            'ownerId' => ' ',
        ];
    }
}
