<?php

namespace app\features\product\usecase;

use app\features\product\repository\ProductRepository;

class GetListPopularsProductsUseCase
{
    private ProductRepository $productRepository;

    public function __construct(
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function execute() {
        return $this->productRepository->getListPopularsProducts();
    }
}