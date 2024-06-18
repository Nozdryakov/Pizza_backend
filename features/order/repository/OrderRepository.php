<?php

namespace app\features\order\repository;




class OrderRepository{
    public function GetListOrderUser(): array{
        return Areas::find()->asArray()->all();
    }
}