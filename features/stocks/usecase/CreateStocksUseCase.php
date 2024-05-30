<?php

namespace app\features\stocks\usecase;

use app\features\stocks\repository\StockRepository;


class CreateStocksUseCase
{
    private StockRepository $createRepository;

    public function __construct(
        StockRepository $createRepository
    )
    {
        $this->createRepository = $createRepository;
    }

    public function execute($image, $discount, $product_id): bool
    {
        return $this->createRepository->itemCreate($image, $discount, $product_id);
    }

}