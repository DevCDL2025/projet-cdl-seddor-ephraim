<?php

namespace Database\Seeders;

use Domain\Shared\Enums\ConstantsEnum;
use Domain\Users\Enums\UsersEnum;
use Domain\Users\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "\e[32mSeeding:\e[0m Users \r\n";

        $users = UsersEnum::cases();

        $superAdminUser = UsersEnum::SUPER_ADMIN_USER;
        $adminUser      = UsersEnum::ADMIN_USER;

        // Create Super Admin User
        $this ->seedUsers($superAdminUser ->description(), $superAdminUser ->role());

        // Create Admin User
        $this ->seedUsers($adminUser ->description(), $adminUser ->role());
    }

    protected function seedUsers(array $data, $role = null) : void
    {
        $createdUser = new User();

        $createdUser->fill($data);

        $createdUser->password          = Hash::make(ConstantsEnum::DEFAULT_PASSWORD->description());
        $createdUser->email_verified_at = now();

        $createdUser->save();

        if ($role !== null) {
            $createdUser ->admin() ->create() ->assignRole($role);
        }
    }
}
