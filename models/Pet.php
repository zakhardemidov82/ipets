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
            [['breed', 'nameId', 'color', 'dob', 'gender', 'pedigree_number', 'number_KSU', 'number_FCI', 'registration_club', 'breeding_club', 'comments', 'puppy_card_number', 'participation_in_the_exhibition'], 'required'],
            [['nameId', 'pedigree_number', 'number_KSU', 'number_FCI', 'father', 'mother', 'dignityId', 'awardsId', 'puppy_card_number', 'participation_in_the_exhibition'], 'integer'],
            [['dob'], 'safe'],
            [['comments'], 'string'],
            [['registration_club', 'breed', 'color', 'breeding_club'], 'string', 'max' => 255],
            [['nameId'], 'default', 'value' => 0],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'breed' => 'Порода',
            'nameId' => 'Кличка',
            'color' => 'Окрас',
            'dob' => 'Дата рождения',
            'gender' => 'Пол',
            'pedigree_number' => 'Номер родословной',
            'number_KSU' => 'Номер КСУ',
            'number_FCI' => 'Номер FCI',
            'registration_club' => 'Клуб регистрации',
            'breeding_club' => 'Клуб разведения',
            'comments' => 'Комментарии',
            'father' => 'Отец',
            'mother' => 'Мать',
            'dignityId' => 'Титул',
            'awardsId' => 'Награда',
            'puppy_card_number' => 'Номер щенячей карты',
            'participation_in_the_exhibition' => 'Участие в выставке',
            'gallery' => 'Загрузить от 1 до 5 фотографий в форматах png, jpg'
        ];
    }
    /*public function getOwnerPets()
    {
        return $this->hasMany(OwnerPet::className(), ['pet_id' => 'id']);
    }

    public function getOwners()
    {
        return $this->hasMany(Owner::className(), ['id' => 'item_id'])
            ->via('ownerPets');
    }*/
    /*public function relations()
    {
        return $this->moderationRelations(array(
            'ownerAll' => array(self::HAS_MANY, 'OwnerPets', 'petsId'),
            'ownerRelation' => array(self::HAS_MANY, 'Owner', 'ownerId', 'through' => 'ownerAll'),

        ));
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
}