<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $main_categories=[
            'Dinner',
            'Lunch',
            'Breakfast',
        ];

        foreach($main_categories as $values){
            category::create([
                'title'=>$values,
                'slug'=>Str::slug($values)
            ]);
        }
    }
}
