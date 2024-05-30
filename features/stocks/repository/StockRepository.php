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
    public function itemCreate(string $image, string $discount, $product_id): bool
    {
        $stocks = new Stocks();
        $stocks->image = $image;
        $stocks->discount = $discount;
        $stocks->product_id = $product_id;

        if ($stocks->save()) {
            // Данные успешно сохранены
            return true;
        } else {
            // Если данные не сохранены, можно вывести ошибки в журнал или лог
            Yii::error('Failed to save stocks: ' . print_r($stocks->errors, true));
            return false;
        }
    }

    public function itemUpdate($id,string $title, string $description,string $price) : bool
    {
        $stocks = Stocks::findOne($id);
        if (empty($stocks)) return false;

        $stocks->title = $title;
        $stocks->description = $description;
        $stocks->price = $price;
        return $stocks->save();
    }
    public function uploadImageId(string $image, string $id) : bool
    {
        $stocks = Stocks::findOne($id);
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