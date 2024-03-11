<?php

namespace app\features\popular\usecase;

use app\features\popular\repository\PopularRepository;
use app\features\popular\PopularInterface;

class GetAllPopularUseCase
{
    private PopularInterface $popularRepository;

    public function __construct(
        PopularRepository $popularRepository
    )
    {
        $this->popularRepository = $popularRepository;
    }

    public function execute(): array
    {
        return $this->popularRepository->getListAllPopular();
    }
}