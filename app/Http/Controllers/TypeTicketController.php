<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeTicket;
use App\Models\AttentionSchedule;
use App\Models\Ticket;
use PDF;

class TypeTicketController extends Controller
{
  public function index(){
    $typeTickets = TypeTicket::paginate('10');
    return view('admin.type-tickets.index',compact('typeTickets'));
  }

  public function create()
  {
    return view("admin.type-tickets.create");
  }

  public function store(Request $request)
  {
    $request->validate([
      "name"=>"required|string"
    ]);

    $typeTicket = TypeTicket::create($request->all());

    return redirect()->route("typeTickets.index")->with("ok", "ok");

  }


  public function edit($id)
  {
    $typeTicket = TypeTicket::findOrFail($id);
    return view("admin.type-tickets.edit", compact("typeTicket"));
  }

  public function update($id, Request $request)
  {
    $request->validate(['name'=>'required']);
    $typeTicket = TypeTicket::findOrFail($id);
    $typeTicket->update(['name'=>$request->name]);
    return redirect()->route('typeTickets.index')->with('editok', 'editok');
  }

  public function delete($id)
  {
    $typeTicket = TypeTicket::findOrFail($id);
    $typeTicket->delete();
    return redirect()->route("typeTickets.index")->with("deleteok", "deleteok");
  }

  public function get($id)
  {
    $horario = AttentionSchedule::latest()->first();
    $hora = date("H:i:s");

    $horarioStart = strtotime($horario->start);
    $horarioEnd = strtotime($horario->end);
    $hora2 = strtotime(date("H:i:s"));

    if( $hora2 >= $horarioStart   && $hora2 <= $horarioEnd){
      $turno = Ticket::create([
        "status" => 0,
        "type_ticket_id" => $id,
       ]);

       $typeTicket = TypeTicket::findOrFail($id);

      $pdf = PDF::loadView("admin.type-tickets.pdf.ticket", compact("horario", "turno", "typeTicket"));
      return $pdf->download('turno'.$turno->id.".pdf");

    }else{
      return redirect()->route("welcome")->with('error', 'error');
    }

  }

}
