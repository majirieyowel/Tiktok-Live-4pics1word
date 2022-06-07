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
                'images/01.PNG',
                'mouse'
            ],
            [
                'images/02.PNG',
                'ice'
            ],
            [
                'images/03.PNG',
                'box'
            ],
            [
                'images/04.PNG',
                'ring'
            ],
            [
                'images/05.PNG',
                'wave'
            ],
            [
                'images/06.PNG',
                'pet'
            ],
            [
                'images/07.PNG',
                'horse'
            ],
            [
                'images/08.PNG',
                'root'
            ],
            [
                'images/09.PNG',
                'bark'
            ],
            [
                'images/10.PNG',
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
