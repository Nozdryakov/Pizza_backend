<?php

namespace app\features\product\repository;

use app\features\product\DeleteProductInterface;
use app\features\product\ProductInterface;
use app\models\Categories;

use app\models\Product;
use Yii;
use yii\db\StaleObjectException;


class ProductRepository implements ProductInterface, DeleteProductInterface
{
    public function getListAllProducts(): array {
        return  Categories::find()->joinWith('products')->asArray()->all();
    }
    public function itemCreate(string $title, string $description,string $price, string $image, int $category_id) : bool
    {
        $product = new Product();
        $product->title = $title;
        $product->image = $image;
        $product->description = $description;
        $product->price = $price;
        $product->category_id = $category_id;
        return $product->save();
    }
    public function itemUpdate($product_id,string $title, string $description,string $price) : bool
    {
        $product = Product::findOne($product_id);

        if (empty($product)) return false;

        $product->title = $title;
        $product->description = $description;
        $product->price = $price;
        return $product->save();
    }
    public function uploadImageId(string $image, string $id) : bool
    {
        $product = Product::findOne($id);
        if (empty($product)) return false;

        $product->image = $image;
        return $product->save();
    }


    /**
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function itemDelete($product_id)
    {
        $product = Product::findOne(['product_id' => $product_id]);

        if (empty($product)) return false;

        return $product->delete();
    }
    public function updateProductPriceWithDiscount($product_id, string $discount)
    {
        if (!is_string($discount)) {
            return ['error' => 'Discount is not a string.'];
        }
        if (!is_numeric($discount)) {
            return ['error' => 'Discount is not a numeric value.'];
        }
        $discount = floatval($discount);

        $product = Product::findOne(['product_id' => $product_id]);

        if (!isset($product)) {
            return ['error' => 'Product not found.'];
        }

        $originalPrice = $product->price;
        $discountedPrice = $originalPrice - ($originalPrice * ($discount / 100));
        $product->price = $discountedPrice;

        if (!$product->save()) {
            return ['error' => 'Failed to save product.', 'validation_errors' => $product->getErrors()];
        }

        return ['success' => true];
    }

    public function updateProductVisible($product_id, $visible): bool
    {
        $product = Product::findOne(['product_id' => $product_id]);
        if (empty($product)) return false;
        $product->visible = $visible;
        return $product->save();
    }


}