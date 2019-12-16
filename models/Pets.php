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
            'breedId' => 'Breed ID',
            'name' => 'Name',
            'colorId' => 'Color ID',
            'ownerId' => 'Owner ID',
            'dob' => 'Dob',
            'genderId' => 'Gender ID',
            'pedigree_number' => 'Pedigree Number',
            'number_KSU' => 'Number Ksu',
            'number_FCI' => 'Number Fci',
            'registration_club' => 'Registration Club',
            'breeding_club' => 'Breeding Club',
            'comments' => 'Comments',
            'father' => 'Father',
            'mother' => 'Mother',
            'dignityId' => 'Dignity ID',
            'awardsId' => 'Awards ID',
            'puppy_card_number' => 'Puppy Card Number',
            'participation_in_the_exhibition' => 'Participation In The Exhibition',
        ];
    }
}
