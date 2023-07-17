<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test;
use App\Models\TableObject;

class TableObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($n = 1; $n <= 8; $n++) {

            $table_object = new TableObject;

            $table_object->test_id = Test::all()->where("name", "Кто самый сильный мститель?")->first()->id;
            $table_object->name = "Мститель №{$n}";
            $table_object->description = "Сильный мститель";
            $table_object->image = "static/o9DPucawmHHxKlctm5tROnW2Dnm32jlFp89awIN3.jpg";
            
            $table_object->save();

        }

    }
}
