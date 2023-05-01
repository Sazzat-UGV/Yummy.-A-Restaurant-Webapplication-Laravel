<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name=$this->faker->sentence(2);
        return [
            'category_id'=>category::select('id')->get()->random()->id,
            'name'=>$name,
            'slug'=>Str::slug($name),
            'menu_item'=>$this->faker->sentence(5),
            'price'=>$this->faker->numberBetween(10,500),
            'product_image'=>'default_product.png',
        ];
    }
}
