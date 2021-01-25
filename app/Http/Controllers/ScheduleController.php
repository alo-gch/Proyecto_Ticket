<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttentionSchedule;
class ScheduleController extends Controller
{
  public function index(){
    $horario = AttentionSchedule::latest()->first();
    return view("admin.schedule.schedule", compact("horario"));
  }

  public function store(Request $request){
    //dd($request->all());
    $request->validate([
      "start"=> "required|date_format:H:i",
      "end"=>"required|date_format:H:i|after:start"
    ]);
    $newSchedule = AttentionSchedule::create($request->all());
    return redirect()->back()->with("ok","ok");
  }
}
