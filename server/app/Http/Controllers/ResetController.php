<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Question\Question;

class ResetController extends Controller
{

    public function index()
    {
        DB::table('leader_boards')->truncate();
        DB::table('winner')->truncate();
        DB::table('tracker')->truncate();
        DB::table('questions')->update([
            "answered" => 0
        ]);

        return response()->json(['status' => 'ok']);
    }

}