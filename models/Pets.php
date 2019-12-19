<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pets".
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
class Pets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['breedId', 'name', 'colorId', 'ownerId', 'dob', 'genderId', 'pedigree_number', 'number_KSU', 'number_FCI', 'registration_club', 'breeding_club', 'comments', 'puppy_card_number', 'participation_in_the_exhibition'], 'required'],
            [['breedId', 'colorId', 'ownerId', 'genderId', 'pedigree_number', 'number_KSU', 'number_FCI', 'father', 'mother', 'dignityId', 'awardsId', 'puppy_card_number', 'participation_in_the_exhibition'], 'integer'],
            [['dob'], 'safe'],
            [['comments'], 'string'],
            [['name', 'registration_club', 'breeding_club'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'breedId' => 'Порода',
            'name' => 'Кличка',
            'colorId' => 'Окрас',
            'ownerId' => 'Владелец',
            'dob' => 'Дата рождения',
            'genderId' => 'Пол',
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
        ];
    }
}
