<?php

namespace Database\Seeders;

use Domain\Positions\Enums\PositionEnum;
use Domain\Positions\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "\e[32mSeeding:\e[0m Positions \r\n";

        $positions = PositionEnum::cases();

        foreach ($positions as $position) {
            Position::create([
                "code"        => $position->value,
                "label"       => $position->label(),
                "description" => $position->description(),
            ]);
        }
    }
}
