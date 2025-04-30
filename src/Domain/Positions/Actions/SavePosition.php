<?php

declare(strict_types=1);


namespace Domain\Positions\Actions;

use Domain\Positions\Data\PositionData;
use Domain\Positions\Models\Position;

class SavePosition
{
    public static function execute(PositionData $data, Position $position = null) : void
    {
        $position = $position ?? new Position();

        $position->fill([
            "code"  => $data->code,
            "label" => $data->label,
            "description" => $data->description,
        ]) ->save();
    }
}
