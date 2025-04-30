<?php

declare(strict_types=1);


namespace Domain\IdentityDocuments\Enums;

use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;

enum IdentityDocumentEnum: string implements EnumsDefinition
{
    use EnumEnhancements;

    case PASSPORT           = 'passport';
    case CNI                = 'cni';
    case LAISSER_PASSER     = 'laisser-passer';
    case CARTE_DE_SEJOUR    = 'carte-de-sejour';
    case PERMIS_DE_CONDUIRE = 'permis-de-conduire';
    case ACTE_DE_NAISSANCE  = 'acte-de-naissance';

    public function label(): string
    {
        return match ($this) {
            self::PASSPORT           => 'Passport',
            self::CNI                => "Carte Nationale d'identité",
            self::LAISSER_PASSER     => 'Laisser-passer',
            self::CARTE_DE_SEJOUR    => 'Carte de séjour',
            self::PERMIS_DE_CONDUIRE => 'Permis de conduire',
            self::ACTE_DE_NAISSANCE  => 'Acte de naissance',
        };
    }

    public function description(): string
    {
        return $this ->label();
    }
}
