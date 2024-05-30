<?php

namespace app\models;

use yii\base\Model;

class StockForm extends Model
{
    public $title;
    public $description;
    public $price;
    public $discount;

    public function rules()
    {
        return [
            [['title','description', 'price', 'discount'], 'required'],
        ];
    }

}