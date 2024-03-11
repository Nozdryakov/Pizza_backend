<?php

namespace app\features\stocks\usecase;

use app\features\stocks\repository\StockRepository;
use app\features\stocks\DeleteStocksInterface;

class DeleteStocksUseCase
{
    private DeleteStocksInterface $deleteRepository;

    public function __construct(
        StockRepository $deleteRepository
    )
    {
        $this->deleteRepository = $deleteRepository;
    }

    public function execute($id)
    {
        return $this->deleteRepository->itemDelete($id);
    }
}