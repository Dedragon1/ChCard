<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test;
use App\Models\User;
use App\Models\Category;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test = new Test;

        $test->name = "Кто самый сильный мститель?";
        $test->description = "Тест предожит вам выбрать самого сильного мстителя по вашему мнению. Здесь представлены главные герои основных франшиз";
        $test->category_id = Category::all()->where("name", "Кино")->first()->id;
        $test->user_id =  User::all()->first()->id;
        $test->number_passes = 0;
        $test->activity = 1;
        
        $test->save();
    }
}
