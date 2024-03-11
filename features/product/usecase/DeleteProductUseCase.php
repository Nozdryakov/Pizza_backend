<?php

namespace app\features\product\usecase;

use app\features\product\repository\ProductRepository;
use app\features\product\DeleteProductInterface;
use yii\db\StaleObjectException;

class DeleteProductUseCase
{
    private DeleteProductInterface $deleteRepository;

    public function __construct(
        ProductRepository $deleteRepository
    )
    {
        $this->deleteRepository = $deleteRepository;
    }

    /**
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function execute(int $id)
    {
        return $this->deleteRepository->itemDelete($id);
    }
}