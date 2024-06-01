<?php

namespace app\models;

use yii\base\Model;

class ProductForm extends Model
{
    public $title;
    public $price;
    public $image;

    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg, png, jpeg', 'wrongExtension' => 'Только форматы jpg и png'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 90],
        ];
    }
}
