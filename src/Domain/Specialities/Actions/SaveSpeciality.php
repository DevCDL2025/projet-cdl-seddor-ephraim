<?php

declare(strict_types=1);


namespace Domain\Specialities\Actions;

use Domain\Specialities\Data\SpecialityData;
use Domain\Specialities\Models\Speciality;

class SaveSpeciality
{
    public static function execute(SpecialityData $data, Speciality $speciality = null) : void
    {
        $speciality = $speciality ?? new Speciality();

        $speciality ->fill([
            "code"               => $data->code,
            "label"              => $data->label,
            "description"        => $data->description,
        ]) ->save();
    }
}
