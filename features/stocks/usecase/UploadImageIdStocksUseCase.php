<?php

namespace app\features\stocks\usecase;

use app\features\stocks\repository\StockRepository;

class UploadImageIdStocksUseCase
{
    public StockRepository $createRepository;

    public function __construct(
        StockRepository $createRepository
    )
    {
        $this->createRepository = $createRepository;
    }

    public function execute($image, $stock_id): bool
    {
        return $this->createRepository->uploadImageId($image, $stock_id);
    }

}