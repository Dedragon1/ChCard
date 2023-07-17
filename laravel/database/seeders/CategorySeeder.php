<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $category = new Category;      

        $category->name = "Кино";
        $category->image = "static/4U4UOkrcNYxFHxZd6DyrQ9M6T62P9iMzxz7TWFEL.jpg";

        $category->save();

    }
}
