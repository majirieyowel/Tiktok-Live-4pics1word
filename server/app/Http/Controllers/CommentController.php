<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function saveComment(Request $request)
    {
        $active_question = DB::table('tracker')->first();

        if ($active_question) {

            $question = DB::table('questions')->where('id', $active_question->current_question)->first();

            if (strtolower($request->answer) == strtolower($question->answer)) {
                //success - update leader board 
         
                if (!DB::table('winner')->first()) {

                    $this->answerCorrect($request->name, $request->image);

                    DB::table('winner')->insert([
                        'username' => $request->name,
                        'answer' => $request->answer,
                        'image' => $request->image
                    ]);
                }

                DB::table('questions')->where('id', $active_question->current_question)->update([
                    'answered' => true
                ]);
            }
        }

        return response()->json(['status' => 'ok']);
    }

    function answerCorrect($name, $image)
    {

        //check if user exists in board 
        $exists = DB::table('leader_boards')->where('username', $name)->first();

        if ($exists) {

            DB::table('leader_boards')->where('username', $name)->update([
                'username' => $name,
                'count' => (int) $exists->count + 1
            ]);
        } else {

            DB::table('leader_boards')->insert([
                'username' => $name,
                'count' => 1,
                'image' => $image
            ]);
        }
    }
}
