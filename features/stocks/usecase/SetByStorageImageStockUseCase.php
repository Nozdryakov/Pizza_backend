<?php

namespace app\features\stocks\usecase;

use yii\web\UploadedFile;

class SetByStorageImageStockUseCase
{
    public function execute()
    {
        $uploads = UploadedFile::getInstancesByName("imageFile");

        if (empty($uploads)) {
            return false;
        }

        foreach ($uploads as $file) {
            if ($file instanceof UploadedFile) {
                if (in_array($file->extension, ['jpg', 'png', 'jpeg'])) {
                    if ($file->saveAs('images/stocks/' . $file->name)) {
                        return $file->name;
                    } else {
                        return false;
                    }
                }
            }
        }

        return false;
    }
}