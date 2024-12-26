<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            AutherSeeder::class,
            PublisherSeeder::class,
            StudentSeeder::class,      // Ensure this runs before BookIssueSeeder
            BookSeeder::class,
            BookIssueSeeder::class,    // Now runs after StudentSeeder
            SettingsSeeder::class,
        ]);
    }
}
