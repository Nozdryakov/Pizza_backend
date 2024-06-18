<?php

namespace app\features\areas\repository;



use app\models\Areas;

class AreaRepository{
    public function GetListArea(): array{
        return Areas::find()->asArray()->all();
    }
}