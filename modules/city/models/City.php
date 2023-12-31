<?php

namespace app\modules\city\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $name
 * @property string $date_create
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_create'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_create' => 'Date Create',
        ];
    }

    public static function setSessionCity(string $cityName)
    {
        if ($city = self::findOne(['name' => $cityName])) {
            Yii::$app->session->set('city', $city->id);
        } else {
            $newCity = new City();
            $newCity->name = $cityName;
            $newCity->save();

            self::setSessionCity($cityName);
        }
    }
}
