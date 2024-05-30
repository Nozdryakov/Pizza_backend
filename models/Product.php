<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property resource|null $image
 * @property string $title
 * @property string $description
 * @property float $price
 * @property int|null $category_id
 *
 * @property Categories $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'string'],
            [['title', 'price'], 'required'],
            [['price'], 'number'],
            [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 90],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product_Id',
            'image' => 'Image',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
//    public function getCategory()
//    {
//        return $this->hasOne(Categories::class, ['id' => 'category_id']);
//    }
    public function getStocks()
    {
        return $this->hasOne(Stocks::class, ['product_id' => 'product_id']);
    }
}
