<?php

namespace app\features\popular\usecase;

use app\features\popular\repository\PopularRepository;
use app\features\popular\DeletePopularInterface;

class DeletePopularUseCase
{
    private DeletePopularInterface $deleteRepository;

    public function __construct(
        PopularRepository $deleteRepository
    )
    {
        $this->deleteRepository = $deleteRepository;
    }

    public function execute($id)
    {
        return $this->deleteRepository->itemDelete($id);
    }
}