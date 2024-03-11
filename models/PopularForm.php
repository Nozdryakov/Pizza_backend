<?php

namespace app\models;

use yii\base\Model;

class PopularForm extends Model
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