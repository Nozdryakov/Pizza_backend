<?php

namespace app\features\popular\usecase;

use app\features\popular\repository\PopularRepository;

use Yii;

class CreatePopularUseCase
{
    public function __construct(
        PopularRepository $createRepository
    )
    {
        $this->createRepository = $createRepository;
    }

    public function execute($title,$description,$price,$image)
    {
        return $this->createRepository->itemCreate($title,$description,$price,$image);
    }

}