<?php

namespace app\features\stocks\repository;

use app\features\stocks\DeleteStocksInterface;
use app\models\Popular;
use app\models\Stocks;
use yii\db\StaleObjectException;


class StockRepository implements DeleteStocksInterface
{
    public function getListAllStocks(): array
    {
       return Stocks::find()->all();
    }
    public function itemCreate(string $title, string $description,string $price, string $image) : bool
    {
        $stocks = new Stocks();
        /** @var TYPE_NAME $stocks */
        $stocks->title = $title;
        /** @var TYPE_NAME $stocks */
        $stocks->image = $image;
        $stocks->description = $description;
        /** @var TYPE_NAME $stocks */
        $stocks->price = $price;
        return $stocks->save();
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