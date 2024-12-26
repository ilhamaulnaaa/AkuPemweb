<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggotaUsers = User::where('role', 'anggota')->get();

        foreach ($anggotaUsers as $user) {
            \App\Models\Student::factory()->create([
                'username' => $user->username,
                // other student fields...
            ]);
        }
    }
}
