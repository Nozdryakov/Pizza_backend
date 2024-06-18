<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property int $order_id
 * @property int|null $product_id
 * @property int $address_id
 * @property int|null $area_id
 * @property string $phoneNumber
 * @property string $streetVal
 * @property string $nameUser
 * @property string $dom
 * @property string $kvartira
 * @property string $poverh
 * @property string $podezd
 * @property integer $type_delivery
 * @property string $paymentMethod
 * @property string $totalCost
 * @property float $price
 * @property int|null $count
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'address_id', 'area_id', 'count'], 'integer'],
            [['price',], 'number'],
            [['phoneNumber', 'streetVal', 'kvartira', 'dom', 'poverh', 'podezd', 'type_delivery', 'totalCost', 'nameUser', 'paymentMethod'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'user_id' => 'User ID',
            'area_id' => 'Area ID',
            'phoneNumber' => 'Phone Number',
            'streetVal' => 'Street',
            'nameUser' => 'Name',
            'paymentMethod' => 'Payment Method',
            'price' => 'Price',
            'count' => 'Count',
        ];
    }
    public function getAddress()
    {
        return $this->hasOne(Address::class, ['address_id' => 'address_id']);
    }
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['product_id' => 'product_id']);
    }
    public function getArea()
    {
        return $this->hasOne(Areas::class, ['area_id' => 'area_id']);
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class, ['product_id' => 'product_id'])
            ->viaTable('order_product', ['order_id' => 'order_id']); // Предполагается, что order_product - это промежуточная таблица
    }
}
