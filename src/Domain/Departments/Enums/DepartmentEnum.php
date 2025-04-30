<?php

declare(strict_types=1);


namespace Domain\Departments\Enums;

use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;

enum DepartmentEnum: string implements EnumsDefinition
{
    use EnumEnhancements;

    case DIRECTION_COORDINATION       = "direction-coordination";
    case AMBULATOIRE_CLINIQUE       = "ambulatoire-clinique";
    case BLOC_URGENCES_REA          = "bloc-urgences-rea";
    case AMBULATOIRE_PARACLINIQUE   = "ambulatoire-paraclinique";
    case HOSPI_POLYVALENTE          = "hospi-polyvalente";
    case MEDECINE_SPEC              = "medecine-spec";
    case MEDECINE_PREV_FAMILLE      = "medecine-prev-famille";
    case MEDECINE_GYNECO_OBST       = "medecine-gyneco-obst";
    case ANALYSES_MED_IMAGERIE      = "analyses-med-imagerie";
    case CLINIQUE_PRIV_CONCIERGERIE = "clinique-priv-conciergerie";


    public function label(): string
    {
        return match ($this) {
            self::DIRECTION_COORDINATION       => "Direction et Coordination",
            self::AMBULATOIRE_CLINIQUE       => "Ambulatoire clinique",
            self::BLOC_URGENCES_REA          => "Urgences, Réanimation, Bloc",
            self::AMBULATOIRE_PARACLINIQUE   => "Ambulatoire paraclinique",
            self::HOSPI_POLYVALENTE          => "Hospitalisation polyvalente",
            self::MEDECINE_SPEC              => "Médecine spécialisée",
            self::MEDECINE_PREV_FAMILLE      => "Médecine préventive et de famille",
            self::MEDECINE_GYNECO_OBST       => "Gynécologie et Obstétrique",
            self::ANALYSES_MED_IMAGERIE      => "Analyses médicales et Imagerie médicale",
            self::CLINIQUE_PRIV_CONCIERGERIE => "Clinique privée conciergerie",
        };
    }

    public function description(): string
    {
        return $this ->label();
    }

    public function type(): DepartmentTypeEnum
    {
        return match ($this) {
            self::DIRECTION_COORDINATION, self::AMBULATOIRE_CLINIQUE, self::BLOC_URGENCES_REA, self::AMBULATOIRE_PARACLINIQUE, self::HOSPI_POLYVALENTE, self::MEDECINE_SPEC => DepartmentTypeEnum::POLE,
            self::MEDECINE_PREV_FAMILLE, self::MEDECINE_GYNECO_OBST, self::ANALYSES_MED_IMAGERIE, self::CLINIQUE_PRIV_CONCIERGERIE                                          => DepartmentTypeEnum::SPECIFIC_UNITY,
        };
    }
}
