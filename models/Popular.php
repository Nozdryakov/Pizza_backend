<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property mixed|string|null $title
 * @property mixed|string|null $description
 * @property mixed|string|null $price
 * @property mixed|string|null $image
 */
class Popular extends ActiveRecord
{
    public static function tableName()
    {
        return 'popular';
    }
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['product_id' => 'product_id']);
    }

}