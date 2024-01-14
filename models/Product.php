<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $productId
 * @property string $title
 * @property float $price
 * @property string $description
 * @property string $photoPath
 *
 * @property Promotions[] $promotions
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'description', 'photoPath'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['title', 'photoPath'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'productId' => 'Product ID',
            'title' => 'Title',
            'price' => 'Price',
            'description' => 'Description',
            'photoPath' => 'Photo Path',
        ];
    }

    /**
     * Gets query for [[Promotions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPromotions()
    {
        return $this->hasMany(Promotions::class, ['productId' => 'productId']);
    }
}
