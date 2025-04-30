<?php

declare(strict_types=1);


namespace Domain\Specialities\Enums;

use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;

enum SpecialityEnum: string implements EnumsDefinition
{
    use EnumEnhancements;

    case CARDIO = "cardio";
    case GYNECO = "gyneco";
    case PEDIATRIE = "pediatrie";
    case GASTRO = "gastro";
    case TRAUMATO = "traumato";
    case RHUMATO = "rhumato";
    case PNEUMO = "pneumo";
    case ORL = "orl";
    case INFECTIOLOGIE = "infectiologie";
    case PODOLOGIE = "podologie";
    case NEURO = "neuro";
    case NUTRITION = "nutrition";
    case OSTEO = "osteo";
    case MED_INTERN = "med-intern";
    case NEURO_CHIR = "neuro-chir";
    case ENDOCRI = "endocri";
    case CHIRURGIE_VISC = "chirurgie-visc";
    case UROLOGIE = "urologie";
    case EXPRT_MEDIC = "exprt-medic";
    case ANESTHESIE_REA = "anesthesie-rea";
    case ANATOMO_PATHO = "anatomo-patho";
    case MEDECINE_GLE = "medecine-gle";
    case OPHTAMO = "ophtamo";
    case HYPNOTHERAPIE = "hypnotherapie";
    case PSYCHOLOGIE = "psychologie";
    case RADIOLOGIE = "radiologie";

    public function label(): string
    {
        return match ($this) {
            self::CARDIO        => "Cardiologie",
            self::GYNECO        => "Gynécologie",
            self::PEDIATRIE      => "Pédiatrie",
            self::GASTRO         => "Gastro-Entérologie",
            self::TRAUMATO       => "Traumatologie",
            self::RHUMATO        => "Rhumatologie",
            self::PNEUMO         => "Pneumologie",
            self::ORL            => "ORL",
            self::INFECTIOLOGIE  => "Infectiologie",
            self::PODOLOGIE      => "Podologie",
            self::NEURO          => "Neurologie",
            self::NUTRITION      => "Nutritionniste",
            self::OSTEO          => "Ostéopathie",
            self::MED_INTERN     => "Médecine interne",
            self::NEURO_CHIR     => "Neurochirurgie",
            self::ENDOCRI        => "Endocrinologie",
            self::CHIRURGIE_VISC => "Chirurgie Viscérale",
            self::UROLOGIE       => "Urologie",
            self::EXPRT_MEDIC    => "Expertise Médicale",
            self::ANESTHESIE_REA => "Anesthésie-Réanimation",
            self::ANATOMO_PATHO  => "Anatomo-Pathologie",
            self::MEDECINE_GLE   => "Médecine Générale",
            self::OPHTAMO        => "Ophtamologie",
            self::HYPNOTHERAPIE  => "Hypnothérapie",
            self::PSYCHOLOGIE    => "Psychologie",
            self::RADIOLOGIE     => "Radiologie",

        };
    }

    public function description(): string
    {
        return match ($this) {
            self::CARDIO        => "Traite les maladies du coeur et des vaisseaux sanguins.",
            self::GYNECO        => "Étude de l'organisme féminin et de son appareil génital.",
            self::PEDIATRIE      => "Soins aux enfants.",
            self::GASTRO         => "S'intéresse aux organes de la digestion et leurs maladies.",
            self::TRAUMATO       => "Étude et traitement des traumatismes et blessures.",
            self::RHUMATO        => "S'occupe des maladies des articulations et des os.",
            self::PNEUMO         => "Étude et traitement des maladies des poumons et bronches.",
            self::ORL            => "Traitement des troubles de l'oreille, du nez et de la gorge.",
            self::INFECTIOLOGIE  => "Prise en charge des maladies infectieuses et tropicales.",
            self::PODOLOGIE      => "Étude et soin des pathologies du pied.",
            self::NEURO          => "Étude et traitement des maladies du système nerveux.",
            self::NUTRITION      => "Spécialiste de la nutrition et de ses liens avec la santé.",
            self::OSTEO          => "Médecine manuelle visant à traiter les dysfonctions de mobilité.",
            self::MED_INTERN     => "Prise en charge globale des cas complexes et maladies systémiques.",
            self::NEURO_CHIR     => "Chirurgie des pathologies du système nerveux.",
            self::ENDOCRI        => "Étude des hormones et troubles hormonaux.",
            self::CHIRURGIE_VISC => "Interventions concernant les organes du ventre.",
            self::UROLOGIE       => "Étude des maladies de l'appareil urinaire et génital masculin.",
            self::EXPRT_MEDIC    => "Évaluation des dommages corporels à des fins juridiques.",
            self::ANESTHESIE_REA => "Techniques pour endormir ou maintenir en vie des patients.",
            self::ANATOMO_PATHO  => "Étude des altérations des tissus et cellules provoquées par des maladies.",
            self::MEDECINE_GLE   => "Prise en charge globale et suivi médical de proximité.",
            self::OPHTAMO        => "Étude et traitement des maladies des yeux.",
            self::HYPNOTHERAPIE  => "Utilisation thérapeutique de l'hypnose pour traiter certaines affections.",
            self::PSYCHOLOGIE    => "Étude scientifique des comportements et phénomènes mentaux.",
            self::RADIOLOGIE     => "",

        };
    }
}
