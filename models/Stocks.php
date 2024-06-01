<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%stocks}}".
 *
 * @property int $id
 * @property resource|null $image
 * @property int|null $product_id
 * @property string|null $discount
 */
class Stocks extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%stocks}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['image'], 'string'],
            [['product_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'product_id' => 'Product ID',
            'discount' => 'Discount',
        ];
    }
}
