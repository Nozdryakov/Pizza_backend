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
            [['product_id'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg, png, jpeg', 'wrongExtension' => 'Только форматы jpg и png'],
        ];
    }

}