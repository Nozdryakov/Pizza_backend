<?php

declare(strict_types=1);

namespace app\features\areas\implementationRepository;

use app\models\Areas;
use app\features\areas\interfaceRepository\IAreaRepository;

class AreaRepository {
    public function GetListArea(): array {
        return Areas::find()->asArray()->all();
    }
}