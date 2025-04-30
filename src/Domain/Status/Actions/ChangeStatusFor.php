<?php

declare(strict_types=1);


namespace Domain\Status\Actions;

use Domain\Status\Data\StatusData;

class ChangeStatusFor
{
    public static function execute(StatusData $data, $model = null, array $params = [])
    {
        $model = app($model) ->where($params) ->first();

        return $model ->fill(['status' => $data ->status]) -> save();
    }
}
