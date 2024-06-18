<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%stocks}}".
 *
 * @property int|null $area_id
 * @property string|null $title
 * @property int|null $count
 */
class Areas extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%areas}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area_id'], 'required'],
            [['title'], 'string'],
            [['count'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'area_id' => 'AREA ID',
            'title' => 'TITLE',
            'count' => 'count',
        ];
    }
    public function getAddress()
    {
        return $this->hasMany(Address::class, ['address_id' => 'address_id']);
    }
}
