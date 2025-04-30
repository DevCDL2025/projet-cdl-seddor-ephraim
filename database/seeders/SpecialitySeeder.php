<?php

namespace Database\Seeders;

use Domain\Specialities\Enums\SpecialityEnum;
use Domain\Specialities\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "\e[32mSeeding:\e[0m Specialities \r\n";

        $specialities = SpecialityEnum::cases();

        foreach ($specialities as $speciality) {
            Speciality::create([
                "code"        => $speciality->value,
                "label"       => $speciality->label(),
                "description" => $speciality->description(),
            ]);
        }
    }
}
