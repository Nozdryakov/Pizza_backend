<?php

namespace app\features\product\usecase;

use app\features\product\repository\ProductRepository;


class CreateProductUseCase
{
    public function __construct(
        ProductRepository $createRepository
    )
    {
        $this->createRepository = $createRepository;
    }

    public function execute($title,$description,$price,$image,$category_id)
    {
        return $this->createRepository->itemCreate($title,$description,$price,$image,$category_id);
    }

}