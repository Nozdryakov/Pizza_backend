<?php

namespace app\features\popular\usecase;

use yii\web\UploadedFile;

class SetByStorageImageUseCase
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