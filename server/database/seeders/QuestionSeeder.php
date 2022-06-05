<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions  = [
            [
                'images/01.png',
                'orange'
            ],
            [
                'images/02.png',
                'tanjalo'
            ]
        ];

        for ($i=0; $i < count($questions); $i++) { 
            DB::table('questions')->insert([
                'image' => $questions[$i][0],
                'answer' => $questions[$i][1]
            ]);
        }
    }
}
