<?php

namespace app\features\stocks\usecase;

use yii\web\UploadedFile;

class SetByStorageImageStockUseCase
{
    public function execute(): ?string
    {
        $uploads = UploadedFile::getInstancesByName("imageFile");

        foreach ($uploads as $file) {
            if ($file instanceof UploadedFile) {
                if (in_array($file->extension, ['jpg', 'png'])) {
                    $file->saveAs('images/stocks/' . $file->name);
                    return $file->name;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        return false;
    }
}