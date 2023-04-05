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

    public function execute($title,$description,$price, $image): bool
    {
        return $this->createRepository->itemCreate($title,$description,$price,$image);
    }

}