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
                'images/01.jpg',
                'mouse'
            ],
            [
                'images/02.jpg',
                'ice'
            ],
            [
                'images/03.jpg',
                'box'
            ],
            [
                'images/04.jpg',
                'ring'
            ],
            [
                'images/05.jpg',
                'wave'
            ],
            [
                'images/06.jpg',
                'pet'
            ],
            [
                'images/07.jpg',
                'horse'
            ],
            [
                'images/08.jpg',
                'root'
            ],
            [
                'images/09.jpg',
                'bark'
            ],
            [
                'images/10.jpg',
                'firm'
            ],
        ];

        for ($i=0; $i < count($questions); $i++) { 
            DB::table('questions')->insert([
                'image' => $questions[$i][0],
                'answer' => $questions[$i][1]
            ]);
        }
    }
}
