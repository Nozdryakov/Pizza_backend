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

    public function execute($id, $title,$description,$price,$category_id)
    {
        return $this->updateRepository->itemUpdate($id,$title,$description,$price, $category_id);
    }

}