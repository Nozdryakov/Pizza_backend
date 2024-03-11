<?php

namespace app\models;

use yii\base\Model;

class StockForm extends Model
{
    public $title;
    public $description;
    public $price;

    public function rules()
    {
        return [
            [['title','description', 'price'], 'required'],
        ];
    }

}