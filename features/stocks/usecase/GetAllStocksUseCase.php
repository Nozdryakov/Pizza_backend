<?php

namespace app\features\stocks\usecase;

use app\features\stocks\repository\StockRepository;

class GetAllStocksUseCase
{
    private StockRepository $stockRepository;

    public function __construct(
        StockRepository $stockRepository
    )
    {
        $this->stockRepository = $stockRepository;
    }

    public function execute(): array
    {
       return $this->stockRepository->getListAllStocks();
    }
}