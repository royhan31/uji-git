<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use DB;
use Storage;
use File;
use App\User;
use App\Result;
use Auth;

class QuestionController extends Controller
{
    public function index(){
      $category = DB::table('questions')
      ->select('category')
      ->groupBy('category')
      ->get();

      $questions = Question::orderBy('category','ASC')->get();
      return response()->json([
        'message' => 'Berhasil',
        'status' => true,
        'data' => [
          'count_category' => count($category),
          'question' => $questions
        ]
      ]);
    }

    public function store(Request $request){
      // try {
        $result = $request->getContent();
        $result = json_decode($result);
        $results = json_decode($result, true);
        $user = User::find(Auth::user()->id);
        // Storage::disk('local')->put('json.txt', $result);
        // $results = json_decode(File::get(public_path('images/json.txt')), true);
        $resUser = Result::where('user_id',$user->id)->get();
        if (!$resUser->isEmpty()) {
           Result::where('user_id',$user->id)->delete();
        }
        for ($i=0; $i < count($results) ; $i++) {
          Result::create([
            'user_id' => $user->id,
            'category' => $results[$i]["name"],
            'score' => $results[$i]["score"]
          ]);
        }
        $res = Result::orderBy('score','DESC')->where('user_id', $user->id)->first();
        return response()->json([
          'message' => $res->category,
          'status' => true,
          'data' => []
        ], 201);
      // } catch (Exception $e) {
        
      // }


    }

    public function showResult($category){
      $lokers = DB::table('lokers')
                ->join('companies','companies.id','=','lokers.company_id')
                ->select('lokers.id','lokers.name','lokers.job','lokers.requirements',
                'lokers.description','lokers.date_opened','lokers.date_closed','lokers.image','companies.company as company')
                ->orderBy('id','DESC')
                ->where('companies.deleted_at', 0)->where('job', $category)
                ->get();
      return response()->json([
        'message' => 'success',
        'status' => true,
        'data' => $lokers
      ], 200);
    }
}
