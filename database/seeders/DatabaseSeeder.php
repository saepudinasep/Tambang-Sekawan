<?php

namespace Database\Seeders;

use App\Models\DataControl\dataApprove;
use App\Models\Kendaraan\driver;
use App\Models\Kendaraan\kendaraan;
use App\Models\Pegawai\pegawai;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        driver::factory(100)->create();
        kendaraan::factory(100)->create();
        pegawai::factory(100)->create();

        $this->call([
            User\userSeeder::class,
            User\roleSeeder::class,
            Kantor\kantorSeeder::class,
            JarakTambang\jarakTambangSeeder::class,
            Tambang\tambangSeeder::class,
        ]);

        dataApprove::factory(200)->create();
    }
}
