<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%address}}".
 *
 * @property int|null $area_id
 * @property string|null $phoneNumber
 * @property string|null $streetVal
 * @property string|null $paymentMethod
 * @property string|null $dom
 * @property string|null $kvartira
 * @property string|null $poverh
 * @property string|null $podezd
 * @property string|null $nameUser
 * @property string|null $type_delivery
 * @property int|null $user_id
 * @property int|null $address_id
 */
class Address extends ActiveRecord
{
    /**
     * @var mixed|null
     */

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%address}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area_id', 'user_id', 'address_id' ], 'integer'],
            [['phoneNumber', 'nameUser', 'streetVal', 'paymentMethod', 'dom', 'kvartira', 'poverh', 'podezd', 'type_delivery'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'area_id' => 'Area ID',
            'phoneNumber' => 'Phone Number',
            'streetVal' => 'Street Value',
            'paymentMethod' => 'Payment Method',
            'dom' => 'Dom',
            'kvartira' => 'Kvartira',
            'poverh' => 'Poverh',
            'podezd' => 'Podezd',
            'totalCost'=> 'totalCost',
            'type_delivery' => 'Type Delivery',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Define relationships
     */

    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_id']);
    }

    public function getOrders()
    {
        return $this->hasMany(Order::class, ['address_id' => 'address_id']);
    }

    public function getArea()
    {
        return $this->hasOne(Areas::class, ['area_id' => 'area_id']);
    }
}