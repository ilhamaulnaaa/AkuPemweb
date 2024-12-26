<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $anggotaUsers = User::where('role', 'anggota')->get();

        foreach ($anggotaUsers as $user) {
            Student::factory()->create([
                'username' => $user->username,
                'name' => $user->name,
                // Assign other necessary fields or use factory defaults
            ]);
        }
    }
}
