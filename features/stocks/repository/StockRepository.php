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
    public function itemCreate(string $image, $product_id): bool
    {
        $stocks = new Stocks();
        $stocks->image = $image;
        $stocks->product_id = $product_id;

        if ($stocks->save()) {
            return true;
        } else {
            Yii::error('Failed to save stocks: ' . print_r($stocks->errors, true));
            return false;
        }
    }

    public function itemUpdate($stock_id,string $discount) : bool
    {
        $stocks = Stocks::findOne($stock_id);
        if (empty($stocks)) return false;

        $stocks->discount = $discount;
        return $stocks->save();
    }
    public function uploadImageId(string $image, string $stock_id) : bool
    {
        $stocks = Stocks::findOne($stock_id);
        if (empty($stocks)) return false;

        $stocks->image = $image;
        return $stocks->save();
    }

    /**
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function itemDelete($id)
    {
        $stocks = Stocks::findOne($id);

        if (empty($stocks)) return false;

        return $stocks->delete();
    }
}