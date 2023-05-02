<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\chef>
 */
class ChefFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name=$this->faker->name;
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'position'=>$this->faker->jobTitle,
            'description'=>$this->faker->paragraph(),
            'chef_image'=>'default-chef.jpg',

        ];
    }
}

