<?php

namespace Database\Seeders;

use Domain\Users\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this ->call([
            //SettingsSeeder::class,
            RolesAndPermissionsSeeder::class,
            UsersSeeder::class,
            IdentityDocumentSeeder::class,
            SpecialitySeeder::class,
            DepartmentSeeder::class,
            PositionSeeder::class,
            DoctorSeeder::class
        ]);
    }
}
