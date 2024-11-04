<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // how to use seeder without factory
        $this->call([
            TestSeeder::class,
        ]);
    }
}


/*
    How to Use:
    php artisan db:seed // will run all seedrs
    php artisan db:seed --class=TestSeeder  //will run this specific class seeder
*/