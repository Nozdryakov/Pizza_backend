<?php

namespace app\features\product\usecase;

use yii\web\UploadedFile;

class SetByStorageImageUseCase
{
    public function execute(): string
    {
        $uploads = UploadedFile::getInstancesByName("imageFile");

        $image = '';

        foreach ($uploads as $file) {
            $file->saveAs('images/' . $file->name);
            $image = 'images/'. $file->name;
        }

        return $image;
    }
}