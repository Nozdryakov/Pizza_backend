<?php

namespace app\features\stocks\usecase;

use yii\web\UploadedFile;

class SetByStorageImageStockUseCase
{
    public function execute(): string
    {
        $uploads = UploadedFile::getInstancesByName("imageFile");

        $image = '';

        foreach ($uploads as $file) {
            $file->saveAs('images/stocks/' . $file->name);
            $image =  $file->name;
        }

        return $image;
    }
}