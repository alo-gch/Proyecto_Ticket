<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeTicket;
use App\Models\Ticket;
use App\Models\User;
use App\Models\People;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $typeTickets = TypeTicket::all();
      return view('welcome', compact("typeTickets"));
    }

    public function fila(){
      $fila = Ticket::where('status', 1)->where('displayed_on_screen', '0')->orderBy("updated_at")
      ->first();

      $data =[];
      $befores =[];


      if( is_null($fila) ){
        $fila = Ticket::where('status', 2)->orWhere('status', 1)->where('displayed_on_screen', '1')->orderBydesc("updated_at")
        ->latest()->first();
      }

      if(!is_null($fila) ){
        $typeTicket = TypeTicket::findOrFail($fila->type_ticket_id);
        $user = User::findOrFail($fila->user_id);
        $people = People::findOrFail($user->id);
        $data = [
          "turno" => substr($typeTicket->name, 0,1) ."-". $fila->id,
          "caja" => $people->cash_receipt_id,
        ];

        $befores = $this->getBefores();
      }




      return view("client.index", compact("data", "befores"));
    }


    public function getFila(){
      $fila = Ticket::where('status', 1)->where('displayed_on_screen', '0')->orderBy("updated_at")
      ->first();

      if(isset($fila->id)){

        $fila->displayed_on_screen = 1;
        $fila->save();
        $typeTicket = TypeTicket::findOrFail($fila->type_ticket_id);
        $user = User::findOrFail($fila->user_id);
        $people = People::findOrFail($user->id);


        return response()->json([
          "turno" => substr($typeTicket->name, 0,1) ."-". $fila->id,
          "caja" => $people->cash_receipt_id,
        ]);

      }else{
        return response()->json([
          "mensaje" => "no hay fila",
        ]);

      }

    }




    public function getBefores(){
      $filas = Ticket::where('status', 2)->where('displayed_on_screen', '1')->orderBydesc("updated_at")
      ->get();

      $befores = [];

      foreach ($filas as $fila) {
        $typeTicket = TypeTicket::findOrFail($fila->type_ticket_id);
        $user = User::findOrFail($fila->user_id);
        $people = People::findOrFail($user->id);

        $data = [
          "turno" => substr($typeTicket->name, 0,1) ."-". $fila->id,
          "caja" => $people->cash_receipt_id,
        ];

        $befores[]  =  $data;

      }

      return $befores;

    }
}
