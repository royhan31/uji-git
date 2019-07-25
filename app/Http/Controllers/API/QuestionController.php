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
      ->select(DB::raw('count(category) as category'))
      ->groupBy('category')
      ->first();

      $questions = Question::orderBy('category','ASC')->get();
      return response()->json([
        'message' => 'Berhasil',
        'status' => true,
        'data' => [
          'count_category' => $count->category,
          'question' => $questions
        ]
      ]);
    }
}