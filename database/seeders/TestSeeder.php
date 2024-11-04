<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /* how to use seeder without factory
        for ($i = 0; $i < 10; $i++) {
            Test::create([
                'name' => 'test _' . $i,
                'description' => 'content _' . $i,
                'status' => 'enable',
                'show' => '1',
            ]);
        }
        */

        Test::factory()->count(10)->create();



    }
}
