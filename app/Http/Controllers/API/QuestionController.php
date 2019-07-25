<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use DB;

class QuestionController extends Controller
{
    public function index(){
      $count = DB::table('questions')
      ->select('category')
      ->groupBy('category')
      ->get();

      $questions = Question::orderBy('category','ASC')->get();
      return response()->json([
        'message' => 'Berhasil',
        'status' => true,
        'data' => [
          'count_category' => count($count),
          'question' => $questions
        ]
      ]);
    }
}
