<?php

namespace app\features\popular\repository;

use app\features\popular\DeletePopularInterface;
use app\models\Popular;
use app\features\popular\PopularInterface;
use app\models\Product;
use yii\db\StaleObjectException;

class PopularRepository implements PopularInterface, DeletePopularInterface
{

    public function getListAllPopular(): array
    {
        return Popular::find()->asArray()->all();
    }
    public function itemCreate(string $title, string $description,string $price, string $image) : bool
    {
        $popular = new Popular();
        $popular->title = $title;
        $popular->image = $image;
        $popular->description = $description;
        $popular->price = $price;
        return $popular->save();
    }
   
    public function uploadImage(string $image) : bool
    {
        $popular = new Popular();
        $popular->image = $image;
        return $popular->save();
    }
    public function uploadImageId(string $image, string $id) : bool
    {
        $popular = Popular::findOne($id);
        if (empty($popular)) return false;

        $popular->image = $image;
        return $popular->save();
    }
    public function itemUpdate($id,string $title, string $description,string $price) : bool
    {
        $popular = Popular::findOne($id);
        if (empty($popular)) return false;

        $popular->title = $title;
        $popular->description = $description;
        $popular->price = $price;
        return $popular->save();
    }


    /**
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function itemDelete($id)
    {
        $popular = Popular::findOne($id);

        if (empty($popular)) return false;

        return $popular->delete();
    }
}  