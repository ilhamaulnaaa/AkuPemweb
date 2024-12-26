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
            BookSeeder::class,
            BookIssueSeeder::class,
            SettingsSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
