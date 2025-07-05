<?php

namespace app\features\areas\usecase;

use app\features\areas\implementationRepository\AreaRepository;
use app\features\areas\interfaceRepository\IAreaRepository;

class GetListAreaUseCase
{

    public function __construct(
        AreaRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function execute(): array {
        return $this->repository->GetListArea();
    }
}