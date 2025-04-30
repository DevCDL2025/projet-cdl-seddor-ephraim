<?php

namespace Database\Seeders;

use Domain\Departments\Enums\DepartmentEnum;
use Domain\Departments\Models\Department;
use Domain\Doctors\Actions\SaveDoctor;
use Domain\Doctors\Data\DoctorData;
use Domain\Shared\Enums\DaysOfWeekEnum;
use Domain\Specialities\Enums\SpecialityEnum;
use Domain\Specialities\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $doctors = [

            [
                "last_name"=> "Dr. MOUNGA MBASSI",
                "first_name"=> "Merveille",
                "email"=> "doctorm@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::MEDECINE_GLE) ->first() ->id,
                "departments"=> [
                    Department::where("code", DepartmentEnum::AMBULATOIRE_CLINIQUE) -> first()->id,
                ],
            ],

            [
                "last_name"=> "Dr. SANMA",
                "first_name"=> "Farid",
                "email"=> "doctorsa@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::ANESTHESIE_REA) ->first() ->id,
                "departments"=> [
                    Department::where("code", DepartmentEnum::BLOC_URGENCES_REA) -> first()->id,
                ],
            ],

            [
                "last_name"=> "Dr. DE SOUZA",
                "first_name"=> "",
                "email"=> "doctorde@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::RADIOLOGIE) ->first() ->id,
                "departments"=> [
                    Department::where("code", DepartmentEnum::AMBULATOIRE_PARACLINIQUE) -> first()->id,
                ],
            ],

            [
                "last_name"=> "Dr. DJIEUKAM TOKO",
                "first_name"=> "Danielle",
                "email"=> "doctordj@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::GASTRO) ->first() ->id,
                "departments"=> [
                    Department::where("code", DepartmentEnum::HOSPI_POLYVALENTE) -> first()->id,
                ],
            ],

            [
                "last_name"=> "Dr. MELO TECHE",
                "first_name"=> "Ghislaine",
                "email"=> "doctormt@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::CARDIO) ->first() ->id,
                "departments"=> [
                    Department::where("code", DepartmentEnum::MEDECINE_SPEC) -> first()->id,
                ],
            ],

            [
                "last_name"=> "Dr. OBAME ASSOUMOU",
                "first_name"=> "Victor",
                "email"=> "doctoroa@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::CARDIO) ->first() ->id,
                "departments"=> [
                    Department::where("code", DepartmentEnum::MEDECINE_PREV_FAMILLE) -> first()->id,
                ],
            ],

            [
                "last_name"=> "Dr. CHITOU",
                "first_name"=> "",
                "email"=> "doctorchi@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::GYNECO) ->first() ->id,
                "departments"=> [
                    Department::where("code", DepartmentEnum::MEDECINE_GYNECO_OBST) -> first()->id,
                ],
            ],

            [
                "last_name"=> "Dr. MAIGA",
                "first_name"=> "",
                "email"=> "doctormai@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::GYNECO) ->first() ->id,
                "departments"=> [
                    Department::where("code", DepartmentEnum::MEDECINE_GYNECO_OBST) -> first()->id,
                ],
            ],

            [
                "last_name"=> "Dr. MINKO",
                "first_name"=> "",
                "email"=> "doctormink@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::GYNECO) ->first() ->id,
                "departments"=> [
                    Department::where("code", DepartmentEnum::MEDECINE_GYNECO_OBST) -> first()->id,
                ],
            ],

            [
                "last_name"=> "Dr. SALOM RODRIGUEZ",
                "first_name"=> "Yanet Rosana",
                "email"=> "doctorsr@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::GYNECO) ->first() ->id,
                "departments"=> [
                    Department::where("code", DepartmentEnum::CLINIQUE_PRIV_CONCIERGERIE) -> first()->id,
                ],
            ],

            [
                "last_name"=> "Pr ITOUDI",
                "first_name"=> "",
                "email"=> "doctorit@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::GASTRO) ->first() ->id,
                "departments"=> [],
            ],

            [
                "last_name"=> "Mme GABA",
                "first_name"=> "",
                "email"=> "doctorga@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::NUTRITION) ->first() ->id,
                "departments"=> [],
            ],

            [
                "last_name"=> "Dr SOULEYMANE",
                "first_name"=> "",
                "email"=> "doctorso@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::OPHTAMO) ->first() ->id,
                "departments"=> [],
            ],

            [
                "last_name"=> "Dr IBINGA",
                "first_name"=> "Linda",
                "email"=> "doctorib@test.com",
                "phone_number"=> "066000000",
                "speciality"=> Speciality::where('code', SpecialityEnum::PNEUMO) ->first() ->id,
                "departments"=> [],
            ],
        ];

        foreach ($doctors as $doctor) {
            $doctor = SaveDoctor::execute(DoctorData::from($doctor));

            $day1 = array_rand(DaysOfWeekEnum::array());

            $doctor ->schedules() ->create([
                "days" => DaysOfWeekEnum::from($day1) ->locale(),
                "from" => "8:00",
                "to" => "12:00",
            ]);
        }
    }

    private static function defineDoctorData($last_name, SpecialityEnum $specialityEnum, string $first_name = '', array $departments = []): array
    {
        return [
            "last_name"=> $last_name,
            "first_name"=> $first_name,
            "email"=> "doctor@test.com",
            "phone_number"=> "066000000",
            "speciality"=> Speciality::where('code', $specialityEnum ->value) ->first() ->id,
            "departments"=> [
                Department::whereIn("code", $departments) -> get() -> pluck('id'),
            ],
        ];
    }
}
