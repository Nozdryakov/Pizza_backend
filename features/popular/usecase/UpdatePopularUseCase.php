<?php

namespace app\features\popular\usecase;

use app\features\popular\repository\PopularRepository;

use Yii;

class UpdatePopularUseCase
{
    public function __construct(
        PopularRepository $updateRepository
    )
    {
        $this->updateRepository = $updateRepository;
    }

    public function execute($id, $title,$description,$price)
    {
        return $this->updateRepository->itemUpdate($id,$title,$description,$price);
    }

}