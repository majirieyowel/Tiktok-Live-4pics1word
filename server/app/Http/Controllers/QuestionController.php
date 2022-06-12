<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Question\Question;

class QuestionController extends Controller
{
    protected function fetchQuestion()
    {

        $question = DB::table('questions')
            ->select("id", "image", "answered", "answer")
            ->inRandomOrder()
            ->where('answered', false)
            ->first();


        if ($question) {
            return $question;
        } else {

            return DB::table('questions')
                ->select("id", "image", "answered", "answer")
                ->where('answered', false)
                ->first();
        }
    }

    public function randomQuestion()
    {
        $question = $this->fetchQuestion();


        if (is_null($question)) {

            DB::table('tracker')->truncate();
            DB::table('winner')->truncate();

            DB::table('questions')->update([
                'answered' => false
            ]);

            return response()->json([
                'status' => 'ok',
                'data' => [
                    'ended' => true
                ]
            ]);
        }

        // if (!is_null($question)) {

        //     DB::table('questions')->whereId($question->id)->update([
        //         'answered' => true
        //     ]);
        // }

        // transform answer 

        $hashed_answer = $this->hashAnswer($question->answer);
        $question->answer_count = strlen($question->answer);
        $question->answer = $hashed_answer;

        DB::table('tracker')->truncate();
        DB::table('tracker')->insert([
            'current_question' => $question->id
        ]);

        DB::table('winner')->truncate();

        return response()->json([
            'status' => 'ok',
            'data' => [
                'leaderboard' => $this->leaderBoard(),
                'question' =>  $question,
                'ended' => false
            ]
        ]);
    }

    public function hashAnswer($answer)
    {
        $total_length = 12;

        $answer_length = strlen($answer);

        $needed_padding = $total_length - $answer_length;

        $padding = $this->generateRandomString($needed_padding);

        $shuffled = str_shuffle(\strtoupper($answer) . $padding);

        $split = str_split($shuffled);

        return array_chunk($split, 6);
    }

    public function generateRandomString($length = 10, $characters = 'ABCDEFGHI')
    {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getQuestion($id)
    {
        $tracker = DB::table('tracker')->first();

        if ((int) $tracker->current_question == (int) $id) {

            $sync_status = false;

            $question = DB::table("questions")->select("id", "image", "answered", "answer")
                ->whereId($id)->first();
        } else {

            $sync_status = true;
            $question = DB::table("questions")->select("id", "image", "answered", "answer")
                ->whereId($tracker->current_question)->first();
        }

        $hashed_answer = $this->hashAnswer($question->answer);
        $question->answer_count = strlen($question->answer);
        $question->answer = $hashed_answer;

        $winner = DB::table('winner')->first();

        return response()->json([
            'status' => 'ok',
            'data' => [
                'leaderboard' => $this->leaderBoard(),
                'question' =>  $question,
                'ended' => false,
                'winner' => $winner,
                'out_of_sync' => $sync_status
            ]
        ]);
    }

    public function leaderBoard()
    {

        return DB::table('leader_boards')
            ->select("id", "username", "image", "count")
            ->orderBy("count", 'desc')
            ->latest()
            ->take(4)
            ->get();
    }
}
