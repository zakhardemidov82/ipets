<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "diploma".
 *
 * @property int $id
 * @property int $petId
 */
class Diploma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diploma';
    }
    public $image;
    public $gallery;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['petId'], 'required'],
            [['petId', 'clubId'], 'integer'],
            [['award_description'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'petId' => 'Pet ID',
            'award_description' => 'Опис',
            'gallery' => 'Завантажити від 1 фотографії у форматах png, jpg, jpeg'
        ];
    }
    public function uploadGallery(){
        if ($this->validate()){
            foreach($this->gallery as $file){
                $path = 'upload/store/'. $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        }
        else{
            return false;
        }
    }
}
