<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = [
            [
                'name'   => 'Skin',
            ],
            [
                'name'   => 'E&T',
            ],
            [
                'name'   => 'Heart',
            ],
            [
                'name'   => 'Orthopedic',
            ],
        ];

        foreach ($specialities as $speciality) {
            Speciality::create($speciality);
        }
    }
}
