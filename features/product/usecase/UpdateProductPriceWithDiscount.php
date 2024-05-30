<?php

namespace app\features\product\usecase;

use app\features\product\repository\ProductRepository;


class UpdateProductPriceWithDiscount
{
    public function __construct(
        ProductRepository $updateProductPriceWithDiscount
    )
    {
        $this->updateProductPriceWithDiscount = $updateProductPriceWithDiscount;
    }

    public function execute(int $product_id, $discount)
    {
        return $this->updateProductPriceWithDiscount->updateProductPriceWithDiscount($product_id, $discount);
    }

}