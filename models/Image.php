<?php

namespace app\models;

use Yii;

class Image extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'image';
    }


    public function rules()
    {
        return [
            [['filePath', 'modelName', 'urlAlias'], 'required'],
            [['itemId'], 'integer'],
            [['filePath', 'urlAlias'], 'string', 'max' => 400],
            [['isMain'], 'string', 'max' => 1],
            [['modelName'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 80],
            [['itemId'], 'default', 'value' => 0],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filePath' => 'File Path',
            'itemId' => 'Item ID',
            'isMain' => 'Is Main',
            'modelName' => 'Model Name',
            'urlAlias' => 'Url Alias',
            'name' => 'Название фото',
        ];
    }
}
