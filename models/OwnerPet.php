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
class OwnerPet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'owner_pet';
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
   /* public function rules()
    {
        return [
            [['last_name', 'first_name', 'middle_name'], 'required'],
            [['adres_index', 'house', 'flat', 'petsId'], 'integer'],
            [['date_of_entry'], 'safe'],
            [['comments'], 'string'],
            [['last_name', 'first_name', 'middle_name', 'city', 'street'], 'string', 'max' => 40],
            [['phone_home', 'phone_work'], 'string', 'max' => 15],
            [['email', 'site', 'cipher_in_the_breeding_factory', 'KSU_code'], 'string', 'max' => 100],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 5],
        ];
    }*/


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_id' => 'Власник',
            'pet_id' => 'Собака',
        ];
    }

    public function getIdOwner()
    {
        return $this->hasOne(Owner::className(), ['id' => 'owner_id']);
    }
    public function getIdPet()
    {
        return $this->hasOne(Pet::className(), ['id' => 'pet_id']);
    }
    /*public function getOwnerPets()
    {
        return $this->hasMany(OwnerPet::className(), ['owner_id' => 'id']);
    }

    public function getPets()
    {
        return $this->hasMany(Pet::className(), ['id' => 'pet_id'])
            ->via('ownerPets');
    }*/


    /*public function uploadGallery(){
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
    }*/
    /*public function relations()
    {
        return $this->moderationRelations(array(
            'petsAll' => array(self::HAS_MANY, 'OwnerPets', 'ownerId'),
            'petsRelation' => array(self::HAS_MANY, 'Pet', 'petsId', 'through' => 'petsAll'),

        ));
    }*/
}
