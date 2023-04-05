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

}