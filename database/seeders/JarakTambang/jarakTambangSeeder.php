<?php

namespace Database\Seeders\JarakTambang;

use App\Models\DataControl\jarakKantorKeTambang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class jarakTambangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 1,
            'id_tambang' => 1,
        ]);
        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 1,
            'id_tambang' => 2,
        ]);
        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 1,
            'id_tambang' => 3,
        ]);
        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 1,
            'id_tambang' => 4,
        ]);
        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 1,
            'id_tambang' => 5,
        ]);
        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 1,
            'id_tambang' => 6,
        ]);
        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 2,
            'id_tambang' => 1,
        ]);

        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 2,
            'id_tambang' => 2,
        ]);

        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 2,
            'id_tambang' => 3,
        ]);

        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 2,
            'id_tambang' => 4,
        ]);

        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 2,
            'id_tambang' => 5,
        ]);

        jarakKantorKeTambang::create([
            'id' => Str::uuid(),
            'jarak' => $faker->randomFloat(2, 0, 100),
            'id_kantor' => 2,
            'id_tambang' => 6,
        ]);
    }
}
