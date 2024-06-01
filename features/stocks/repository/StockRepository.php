<?php

namespace app\features\stocks\repository;

use app\features\stocks\DeleteStocksInterface;
use app\models\Popular;
use app\models\Product;
use app\models\Stocks;
use Yii;
use yii\db\StaleObjectException;


class StockRepository implements DeleteStocksInterface
{
    public function getListAllStocks(): array
    {
        return Product::find()
            ->joinWith('stocks')
            ->where(['is not', 'stocks.stock_id', null])
            ->asArray()
            ->all();
    }
    public function itemCreate(string $image, $product_id)
    {
        $existingStock = Stocks::findOne(['product_id' => $product_id]);

        if ($existingStock !== null) {
//            return false;
            return ['id' => 'false'];
        }
        $stocks = new Stocks();
        $stocks->image = $image;
        $stocks->product_id = $product_id;

        if ($stocks->save()) {
//            return true;
            return ['save' => 'true'];
        } else {

//            return false;
            return ['id' => 'false'];
        }
    }


    public function itemUpdate($stock_id, string $discount, string $image)
    {
        $stocks = Stocks::findOne($stock_id);
        if (empty($stocks)) return false;

        $stocks->image = $image;
        $stocks->discount = $discount;

        if ($stocks->save()) {
            return true;
        } else {
            $errors = $stocks->getErrors();
            return $errors;
        }
    }
    public function uploadImageId(string $image, string $stock_id)
    {
        $stocks = Stocks::findOne(['stock_id' => $stock_id]);
        if (empty($stocks)) return false;

        $stocks->image = $image;
        if ($stocks->save()) {
            return true;
        } else {
            $errors = $stocks->getErrors();
            return $errors;
        }
    }

    public function itemDelete($id)
    {
        $stocks = Stocks::findOne($id);
        if (empty($stocks)) return false;

        return $stocks->delete();
    }
}