<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_users')->truncate();
        DB::table('admin_users')->insert([
            [
                'id' => 1,
                'name' => 'shizue',
                'email' => 'shizue@tamtam.org',
                'password' => '$2y$10$.vTGCIahMImj1DXoMJ6FjO3QJKhjxQ7qQfOYm4uDhEjKR304O0wBa',
            ],
            [
                'id' => 2,
                'name' => 'mio',
                'email' => 'mio@tamtam.org',
                'password' => '$2y$10$y7ytfJnsHGreggKh431VCuyYv.ch5NSzyYQCPIjONV0tvqzSemm0u',
            ],
        ]);
    }
}
