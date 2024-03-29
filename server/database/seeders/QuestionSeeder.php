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
            [
                'images/11.jpg',
                'sweet'
            ],
            [
                'images/12.jpg',
                'pull'
            ],
            [
                'images/13.jpg',
                'fruit'
            ],
            [
                'images/14.jpg',
                'bed'
            ],
            [
                'images/15.jpg',
                'sign'
            ],
            [
                'images/16.jpg',
                'assembly'
            ],
            [
                'images/17.jpg',
                'baby'
            ],
            [
                'images/18.jpg',
                'color'
            ],
            [
                'images/19.jpg',
                'spray'
            ],
            [
                'images/20.jpg',
                'roll'
            ],
            [
                'images/21.jpg',
                'music'
            ],
            [
                'images/22.jpg',
                'bird'
            ],
            [
                'images/23.jpg',
                'cold'
            ],
            [
                'images/24.jpg',
                'long'
            ],
            [
                'images/25.jpg',
                'snow'
            ],
            [
                'images/26.jpg',
                'cart'
            ],
            [
                'images/27.jpg',
                'instant'
            ],
            [
                'images/28.jpg',
                'spectrum'
            ],
            [
                'images/29.jpg',
                'peace'
            ],
            [
                'images/30.jpg',
                'back'
            ],
            [
                'images/31.jpg',
                'family'
            ],
            [
                'images/32.jpg',
                'mint'
            ],
            [
                'images/33.jpg',
                'archive'
            ],
            [
                'images/34.jpg',
                'bat'
            ],
            [
                'images/35.jpg',
                'train'
            ],
            [
                'images/36.jpg',
                'tool'
            ],
            [
                'images/37.jpg',
                'animal'
            ],
            [
                'images/38.jpg',
                'fly'
            ],
            [
                'images/39.jpg',
                'surf'
            ],
            [
                'images/40.jpg',
                'hot'
            ],
            [
                'images/41.jpg',
                'console'
            ],
            [
                'images/42.jpg',
                'kiss'
            ],
            [
                'images/43.jpg',
                'stamp'
            ],
            [
                'images/44.jpg',
                'tie'
            ],
            [
                'images/45.jpg',
                'clown'
            ],
            [
                'images/46.jpg',
                'pot'
            ],
            [
                'images/47.jpg',
                'necklace'
            ],
            [
                'images/49.jpg',
                'ear'
            ],
            [
                'images/50.jpg',
                'shoe'
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
