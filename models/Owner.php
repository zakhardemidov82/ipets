<?php

namespace app\models;

use Yii;

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
    public static function tableName()
    {
        return 'owner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'middle_name'], 'required'],
            [['adres_index', 'house', 'flat', 'petsId'], 'integer'],
            [['date_of_entry'], 'safe'],
            [['comments'], 'string'],
            [['last_name', 'first_name', 'middle_name', 'city', 'street'], 'string', 'max' => 40],
            [['phone_home', 'phone_work'], 'string', 'max' => 15],
            [['email', 'site', 'cipher_in_the_breeding_factory', 'KSU_code'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'adres_index' => 'Adres Index',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'flat' => 'Flat',
            'phone_home' => 'Phone Home',
            'phone_work' => 'Phone Work',
            'email' => 'Email',
            'site' => 'Site',
            'date_of_entry' => 'Date Of Entry',
            'cipher_in_the_breeding_factory' => 'Cipher In The Breeding Factory',
            'KSU_code' => 'Ksu Code',
            'comments' => 'Comments',
            'petsId' => 'Pets ID',
        ];
    }
}
