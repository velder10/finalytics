<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for collection "profile".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $name
 * @property mixed $email
 * @property mixed $firstname
 * @property mixed $lastname
 * @property mixed $id
 * @property mixed $cover
 * @property mixed $agerange
 * @property mixed $link
 * @property mixed $gender
 * @property mixed $locale
 * @property mixed $picture
 * @property mixed $timezone
 * @property mixed $updatedtime
 * @property mixed $verified
 * @property mixed $friends
 */
class Profile extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['finalytics', 'profile'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'name',
            'email',
            'firstname',
            'lastname',
            'id',
            'cover',
            'agerange',
            'link',
            'gender',
            'locale',
            'picture',
            'timezone',
            'updatedtime',
            'verified',
            'friends',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'firstname', 'lastname', 'id', 'cover', 'agerange', 'link', 'gender', 'locale', 'picture', 'timezone', 'updatedtime', 'verified', 'friends'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'id' => Yii::t('app', 'Id'),
            'cover' => Yii::t('app', 'Cover'),
            'agerange' => Yii::t('app', 'Agerange'),
            'link' => Yii::t('app', 'Link'),
            'gender' => Yii::t('app', 'Gender'),
            'locale' => Yii::t('app', 'Locale'),
            'picture' => Yii::t('app', 'Picture'),
            'timezone' => Yii::t('app', 'Timezone'),
            'updatedtime' => Yii::t('app', 'Updatedtime'),
            'verified' => Yii::t('app', 'Verified'),
            'friends' => Yii::t('app', 'Friends'),
        ];
    }
}
