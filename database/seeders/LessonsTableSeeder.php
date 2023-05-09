<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonsTableSeeder extends Seeder
{
    public function run()
{
    factory(App\Lesson::class, 10)->create();
}

}
