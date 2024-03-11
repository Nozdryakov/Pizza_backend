<?php

namespace app\features\product\usecase;

use app\features\product\repository\ProductRepository;

class UploadImageIdProductUseCase
{
    public ProductRepository $createRepository;

    public function __construct(
        ProductRepository $createRepository
    )
    {
        $this->createRepository = $createRepository;
    }

    public function execute($image, $id): bool
    {
        return $this->createRepository->uploadImageId($image, $id);
    }

}