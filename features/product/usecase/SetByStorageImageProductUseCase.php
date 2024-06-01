<?php

namespace app\features\product\usecase;

use yii\web\UploadedFile;

class SetByStorageImageProductUseCase
{
    public function execute(): ?string
    {
        $uploads = UploadedFile::getInstancesByName("imageFile");

        foreach ($uploads as $file) {
            if ($file instanceof UploadedFile) {
                if (in_array($file->extension, ['jpg', 'png'])) {
                    $file->saveAs('images/products/' . $file->name);
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

