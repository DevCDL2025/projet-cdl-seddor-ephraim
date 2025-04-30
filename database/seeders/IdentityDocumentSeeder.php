<?php

namespace Database\Seeders;

use Domain\IdentityDocuments\Enums\IdentityDocumentEnum;
use Domain\IdentityDocuments\Models\IdentityDocument;
use Illuminate\Database\Seeder;

class IdentityDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "\e[32mSeeding:\e[0m Identity Document \r\n";

        $identityDocuments = IdentityDocumentEnum::cases();

        foreach ($identityDocuments as $document) {
            IdentityDocument::create([
                "code" => $document ->value,
                "label" => $document ->label(),
            ]);
        }
    }
}
