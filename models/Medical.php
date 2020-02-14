<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medical".
 *
 * @property int $id
 * @property int $petId
 */
class Medical extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medical';
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
            [['petId'], 'integer'],
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
