<?php

namespace app\features\product\usecase;

use yii\web\UploadedFile;

class SetByStorageImageProductUseCase
{
    public function execute(): string
    {
        $uploads = UploadedFile::getInstancesByName("imageFile");

        $image = '';

        foreach ($uploads as $file) {
            $file->saveAs('images/products/' . $file->name);
            $image =  $file->name;
        }

        return $image;
    }
}