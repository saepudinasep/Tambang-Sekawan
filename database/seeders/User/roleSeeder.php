<?php

namespace Database\Seeders\User;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'nama_role' => 'superAdmin',
            'message' => 'Super Admin',
        ]);

        Role::create([
            'nama_role' => 'admin',
            'message' => 'Admin',
        ]);

        Role::create([
            'nama_role' => 'kepalaKantor',
            'message' => 'Kepala Kantor',
        ]);

        Role::create([
            'nama_role' => 'pool',
            'message' => 'Pool',
        ]);

        Role::create([
            'nama_role' => 'service',
            'message' => 'Service',
        ]);
    }
}
