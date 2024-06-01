<?php

namespace app\features\stocks\usecase;

use app\features\stocks\repository\StockRepository;

use Yii;

class UpdateStocksUseCase
{
    public function __construct(
        StockRepository $updateRepository
    )
    {
        $this->updateRepository = $updateRepository;
    }

    public function execute($id, $discount, $image)
    {
        return $this->updateRepository->itemUpdate($id, $discount, $image);
    }

}