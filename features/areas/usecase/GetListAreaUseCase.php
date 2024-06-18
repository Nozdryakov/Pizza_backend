<?php

namespace app\features\areas\usecase;

use app\features\areas\repository\AreaRepository;

class GetListAreaUseCase
{
    public function __construct(
        AreaRepository $areaRepository
    )
    {
        $this->areaRepository = $areaRepository;
    }

    public function execute(): array
    {
        return $this->areaRepository->GetListArea();
    }
}