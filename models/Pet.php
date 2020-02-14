<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "pet".
 *
 * @property int $id
 * @property int $breedId
 * @property string $name
 * @property int $colorId
 * @property int $ownerId
 * @property string $dob
 * @property int $genderId
 * @property int $pedigree_number
 * @property int $number_KSU
 * @property int $number_FCI
 * @property string $registration_club
 * @property string $breeding_club
 * @property string $comments
 * @property int|null $father
 * @property int|null $mother
 * @property int|null $dignityId
 * @property int|null $awardsId
 * @property int $puppy_card_number
 * @property int $participation_in_the_exhibition
 */
class Pet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pet';
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

    public function rules()
    {
        return [
            [['breed', 'nameId', 'color', 'dob', 'gender', 'number_KSU', 'number_FCI', 'registration_club', 'breeding_club',/* 'comments', 'puppy_card_number',
                'participation_in_the_exhibition'*/], 'required'],
            [['nameId','ownerId',  /*'father', 'mother', 'dignityId', 'awardsId', 'puppy_card_number', 'participation_in_the_exhibition'*/], 'integer'],
            [['dob'], 'safe'],
            [['comments'], 'string'],
            [['registration_club', 'father', 'mother','breed', 'color', 'breeding_club', 'work_certificate'], 'string', 'max' => 255],
            [['number_KSU', 'number_FCI','puppy_card_number', 'number_KSU_father', 'number_KSU_mother','chip_number','dignity'], 'string', 'max' => 40],
            [['participation_in_the_exhibition'], 'string', 'max' => 10],
            [['nameId'], 'default', 'value' => 0],
            [['ownerId'], 'default', 'value' => 0],
            [['clubId'], 'default', 'value' => 0],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxFiles' =>2],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'breed' => 'Порода',
            'nameId' => 'Кличка',
            'ownerId' => 'Власник',
            'color' => 'Окрас',
            'dob' => 'Дата народження',
            'gender' => 'Пол',
            'number_KSU' => 'Номер родоводу КСУ',
            'number_FCI' => 'Номер родоводу FCI',
            'chip_number' => 'Номер чипу',
            'registration_club' => 'Клуб реєстрації',
            'breeding_club' => 'Клуб розведення',
            'comments' => 'Коментарі',
            'number_KSU_father' => 'Номер родоводу КСУ батька',
            'number_KSU_mother' => 'Номер родоводу КСУ матері',
            'father' => 'Батько',
            'mother' => 'Мати',
            'dignity' => 'Титул',
            'puppy_card_number' => 'Номер щенячої карти',
            'participation_in_the_exhibition' => 'Участь у виставці',
            'gallery' => 'Завантажити фотографію у форматі \'png\', \'jpg\' або \'jpeg\'',
            'work_certificate' => 'Робочий сертифікат',
        ];
    }
    public function getName()
    {
        return $this->hasOne(PetName::className(), ['id' => 'nameId']);
    }
    public function getOwner()
    {
        return $this->hasOne(Owner::className(), ['id' => 'ownerId']);
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