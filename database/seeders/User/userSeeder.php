<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => Str::uuid(),
            'name' => 'Developer',
            'email' => 'dev@dev.com',
            'password' => bcrypt('dev12345'),
            'role' => 1,
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 2,
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => 'Kepala-Kantor',
            'email' => 'kepalaKantor@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 3,
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => 'Pool',
            'email' => 'pool@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 4,
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => 'Service',
            'email' => 'service@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 5,
        ]);
    }
}
