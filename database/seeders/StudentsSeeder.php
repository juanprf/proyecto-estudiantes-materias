<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsSeeder extends Seeder
{

    public function run()
    {
        for ($i=1; $i<=10; $i++) {
            Student::create([
                'name' => 'Estudiante ' . $i,
                'email' => 'estudiante' . $i . '@example.com',
            ]);
        }
    }

}
