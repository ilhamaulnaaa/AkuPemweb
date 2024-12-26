<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

            // Create five Anggota users with known usernames
            \App\Models\User::factory()->create([
                'name' => 'el royan',
                'username' => 'royan',
                'password' => Hash::make('password1'),
                'role' => 'anggota',
            ]);

            \App\Models\User::factory()->create([
                'name' => 'fufufafa',
                'username' => 'gibran',
                'password' => Hash::make('password2'),
                'role' => 'anggota',
            ]);

            \App\Models\User::factory()->create([
                'name' => 'ppn 12%',
                'username' => 'srimulyani',
                'password' => Hash::make('password3'),
                'role' => 'anggota',
            ]);

            \App\Models\User::factory()->create([
                'name' => 'Om Gemoy',
                'username' => 'prabowo',
                'password' => Hash::make('password4'),
                'role' => 'anggota',
            ]);

            \App\Models\User::factory()->create([
                'name' => 'Si Ahok',
                'username' => 'ahok',
                'password' => Hash::make('password5'),
                'role' => 'anggota',
            ]);
        }
    }
}
