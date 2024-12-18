<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\App\Models\User::count() == 0) {
            \App\Models\User::factory()->create(); // Admin user
            \App\Models\User::factory()->anggota()->create(); // Anggota user
        }
    }
}
