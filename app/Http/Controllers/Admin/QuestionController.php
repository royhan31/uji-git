<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Notification;

class QuestionController extends Controller
{
  public function __construct(){
    $this->middleware('auth:admin');
  }

  public function index(){
    $categories = [
      '1' => 'Frontend Developer',
      '2' => 'Backend Developer',
      '3' => 'Web Developer',
      '4' => 'Android Developer',
      '5' => 'Sistem Analisis',
      '6' => 'Database Administrator',
      '7' => 'UI/UX Designer',
      '8' => 'Hardware Engineer',
      '9' => 'Network Engineer',
      '10' => 'Umum',
    ];
    $notifications = Notification::orderBy('id', 'DESC')->where('company_id',null)->paginate(4);
    $notif = Notification::where('company_id',null)->where('read',false)->get();
    $questions = Question::orderBy('id','DESC')->get();
    return view('home.admin.question', compact('notif','notifications','questions','categories'));
  }

  public function store(Request $request){
    $this->validate($request,[
      'name' => 'string|min:5',
      'point' => 'numeric|min:1',
    ]);
    Question::create([
      'name' => $request->name,
      'category' => $request->category,
      'point' => $request->point
    ]);
    return redirect()->back()->with('success', 'Pertanyaan berhasil ditambahkan');
  }

  public function update(Request $request, Question $question){
    $this->validate($request,[
      'name' => 'string|min:5',
      'point' => 'numeric|min:1',
    ]);
    $question->update([
      'name' => $request->name,
      'category' => $request->category,
      'point' => $request->point
    ]);
    return redirect()->back()->with('success', 'Pertanyaan berhasil diubah');
  }

  public function destroy(Question $question){
    $question->delete();
    return redirect()->back()->with('success', 'Pertanyaan berhasil dihapus');
  }
}
