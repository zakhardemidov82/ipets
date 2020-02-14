<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "owner".
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property int|null $adres_index
 * @property string|null $city
 * @property string|null $street
 * @property int|null $house
 * @property int|null $flat
 * @property string|null $phone_home
 * @property string|null $phone_work
 * @property string|null $email
 * @property string|null $site
 * @property string|null $date_of_entry
 * @property string|null $cipher_in_the_breeding_factory
 * @property string|null $KSU_code
 * @property string|null $comments
 * @property int|null $petsId
 */
class Owner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $image;
    public $gallery;

    public static function tableName()
    {
        return 'owner';
    }

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
            [['last_name', 'first_name', 'last_name_trans', 'first_name_trans', 'middle_name'], 'required'],
            [['adres_index','passport_ID'],'integer'],
            [['date_of_entry','date_of_issue'], 'safe'],
            [['comments'], 'string'],
            [['last_name', 'first_name', 'flat', 'last_name_trans', 'house', 'first_name_trans', 'middle_name', 'city', 'street', 'phone_work', 'phone_home'], 'string', 'max' => 40],
            [['email', 'site', 'cipher_in_the_breeding_factory', 'KSU_code'], 'string', 'max' => 100],
            [['issued_by'], 'string', 'max' => 255],
            [['clubId'], 'default', 'value' => 0],
            [['passport_series'], 'string', 'max' => 10],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 10/*, 'maxSize' => 5242880*/],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Прізвище',
            'last_name_trans' => 'Прізвище транслітом',
            'first_name' => 'Ім\'я',
            'first_name_trans' => 'Ім\'я транслітом',
            'middle_name' => 'По батькові',
            'adres_index' => 'Індекс',
            'city' => 'Місто',
            'street' => 'Вулиця',
            'house' => 'Номер будинку',
            'flat' => 'Номер квартири',
            'phone_home' => 'Домашній телефон',
            'phone_work' => 'Мобільний телефон',
            'email' => 'Email',
            'site' => 'Адреса сайту',
            'date_of_entry' => 'Дата вступу',
            'cipher_in_the_breeding_factory' => 'Шифр у племінному заводі',
            'KSU_code' => 'Шифр КСУ',
            'comments' => 'Коментарі',
            'gallery' => 'Завантажити фотографії у форматі \'png\', \'jpg\' або \'jpeg\'',
        ];
    }

   /* public function getOwnerPets()
    {
        return $this->hasMany(OwnerPet::className(), ['owner_id' => 'id']);
    }

    public function getPets()
    {
        return $this->hasMany(Pet::className(), ['id' => 'pet_id'])
            ->via('ownerPets');
    }*/


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
    /*public function relations()
    {
        return $this->moderationRelations(array(
            'petsAll' => array(self::HAS_MANY, 'OwnerPets', 'ownerId'),
            'petsRelation' => array(self::HAS_MANY, 'Pet', 'petsId', 'through' => 'petsAll'),

        ));
    }*/
}
