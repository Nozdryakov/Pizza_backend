<?php

namespace app\models;

use yii\base\Model;

class HandlerOrder extends Model
{
    public $setFrom;
    public $setSubject;
    public $setTextBody;

    public function rules()
    {
        return [
            [['setFrom','setSubject', 'setTextBody'], 'required'],
            ['setFrom', 'email'],
        ];
    }
}