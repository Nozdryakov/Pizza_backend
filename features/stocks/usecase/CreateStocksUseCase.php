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

    public function execute($image, $product_id)
    {
        return $this->createRepository->itemCreate($image, $product_id);
    }

}