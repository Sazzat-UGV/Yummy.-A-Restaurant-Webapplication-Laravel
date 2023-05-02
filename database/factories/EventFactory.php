<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'event_name'=>$name,
            'slug'=>Str::slug($name),
            'description'=>$this->faker->paragraph(),
            'price'=>$this->faker->numberBetween(50,1000),
            'event_image'=>'default_event.jpg'
        ];
    }
}

