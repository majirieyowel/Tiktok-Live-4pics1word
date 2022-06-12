<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\QuestionSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            QuestionSeeder::class
        ]);
        $question = DB::table('questions')
            ->select("id", "image", "answered", "answer")
            ->inRandomOrder()
            ->where('answered', false)
            ->first();

        DB::table('tracker')->insert([
            "current_question" => $question->id
        ]);

     
    }
}
