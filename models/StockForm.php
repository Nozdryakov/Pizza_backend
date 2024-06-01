<?php

namespace app\models;

use yii\base\Model;

class StockForm extends Model
{
    public $product_id;
    public $discount;
    public $image;

    public function rules()
    {
        return [
            [['image', 'product_id'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg, png', 'wrongExtension' => 'Только форматы jpg и png'],
        ];
    }

}