<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonsSeeder extends Seeder
{
    
    public function run()
    {
        for ($i=1; $i<=10; $i++) {
            Lesson::create([
                'name' => 'Materia ' . $i,
            ]);
        }
    }
    
}
