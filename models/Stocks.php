<?php

namespace app\models;

use yii\db\ActiveRecord;

class Stocks extends ActiveRecord
{
    /**
     * @property mixed|string|null $title
     * @property mixed|string|null $description
     * @property mixed|string|null $price
     * @property mixed|string|null $image
     */

    public static function tableName()
    {
        return 'stocks';
    }
}