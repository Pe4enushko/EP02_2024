<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promotions".
 *
 * @property int $promotionId
 * @property int $productId
 * @property string $label
 * @property string $description
 * @property string $photoPath
 *
 * @property Products $product
 */
class Promotions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productId', 'label', 'description', 'photoPath'], 'required'],
            [['productId'], 'integer'],
            [['description'], 'string'],
            [['label', 'photoPath'], 'string', 'max' => 255],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['productId' => 'productId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'promotionId' => 'Promotion ID',
            'productId' => 'Product ID',
            'label' => 'Label',
            'description' => 'Description',
            'photoPath' => 'Photo Path',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::class, ['productId' => 'productId']);
    }
}
