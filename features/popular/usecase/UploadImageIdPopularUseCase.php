<?php

namespace app\features\popular\usecase;

use app\features\popular\repository\PopularRepository;

class UploadImageIdPopularUseCase
{
    public PopularRepository $createRepository;

    public function __construct(
        PopularRepository $createRepository
    )
    {
        $this->createRepository = $createRepository;
    }

    public function execute($image, $id): bool
    {
        return $this->createRepository->uploadImageId($image, $id);
    }

}