<?php

namespace app\models;

use yii\base\Model;

class ProductForm extends Model
{
    public $title;
    public $price;

    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
        ];
    }

}