<?php

namespace app\features\popular\usecase;

use app\features\popular\repository\PopularRepository;

class UploadImagePopularUseCase
{
    public PopularRepository $createRepository;

    public function __construct(
        PopularRepository $createRepository
    )
    {
        $this->createRepository = $createRepository;
    }

    public function execute($image): bool
    {
        return $this->createRepository->uploadImage($image);
    }

}