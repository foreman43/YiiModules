<?php

namespace app\modules\review\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property int $id_city
 * @property string $title
 * @property string $text
 * @property int $rating
 * @property resource|null $img
 * @property int $id_author
 * @property string $date_create
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_city', 'rating', 'id_author'], 'integer'],
            [['title', 'text', 'id_author'], 'required'],
            [['img'], 'string'],
            [['date_create'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_city' => 'Id City',
            'title' => 'Название отзыва',
            'text' => 'Текст отзыва',
            'rating' => 'Рейтинг',
            'img' => 'Приложение',
            'id_author' => 'Id Author',
            'date_create' => 'Date Create',
        ];
    }
}
