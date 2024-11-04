<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //for factory without faker
            /*
            'name' => 'Test _ from factory',
            'description' => 'Content _ from factory',
            'status' => 'enable',
            'show' => '1',
            */
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'status' => 'enable',
            'show' => '1',


        ];
    }
}
