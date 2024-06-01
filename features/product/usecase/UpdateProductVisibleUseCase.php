<?php

namespace app\features\product\usecase;

use app\features\product\repository\ProductRepository;

use Yii;

class UpdateProductVisibleUseCase
{
    public function __construct(
        ProductRepository $updateProductVisibleRepository
    )
    {
        $this->updateProductVisibleRepository = $updateProductVisibleRepository;
    }

    public function execute($product_id, $visible)
    {
        return $this->updateProductVisibleRepository->updateProductVisible($product_id, $visible);
    }

}