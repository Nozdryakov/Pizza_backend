<?php

namespace app\features\product\usecase;

use app\features\product\repository\ProductRepository;

use Yii;

class UpdateProductUseCase
{
    public function __construct(
        ProductRepository $updateRepository
    )
    {
        $this->updateRepository = $updateRepository;
    }

    public function execute($product_id, $title,$description,$price, $image)
    {
        return $this->updateRepository->itemUpdate($product_id,$title,$description,$price, $image);
    }

}