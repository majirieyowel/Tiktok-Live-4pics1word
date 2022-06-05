<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function saveComment(Request $request)
    {

        $iscorrect = false;

        $active_question = DB::table('tracker')->first();

        $question = DB::table('questions')->where('id', $active_question->current_question)->first();

        if ($request->answer == $question->answer) {
            //success - update leader board 
            $this->answerCorrect($request->name);

            DB::table('questions')->where('id', $active_question->id)->update([
                'answered' => true
            ]);

            $iscorrect = true;
        }

        DB::table('answer_dump')->insert([
            'username' => $request->name,
            'answer' => $request->answer,
            'iscorrect' => $iscorrect
        ]);

        return response()->json(['status' => 'ok']);
    }

    function answerCorrect($name)
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
                'count' => 1
            ]);
        }
    }
}
