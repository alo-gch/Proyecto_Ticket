<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ticket = Ticket::where('status',1)
        ->where('user_id',auth()->user()->id)->first();

        if (!is_null($ticket)) {
            return redirect()->route('tickets.edit',$ticket->id)->with(['error'=>'Cierre el ticket']);
        }

        $tickets = Ticket::where('status',0)->paginate('10');
        return view('checker.tickets.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
        //return $ticket;

        DB::beginTransaction();
        try {
            $ticketOpen = Ticket::where('status',1)
            ->where('user_id',auth()->user()->id)->first();

            if (isset ($ticketOpen->id) && $ticketOpen->id != $ticket->id) {
                return redirect()->route('tickets.edit',$ticketOpen->id)->with(['error'=>'Cierre el ticket']);
            }
            if (
                (is_null($ticket->user_id) && $ticket->status == 0) ||
                ($ticket->user_id == auth()->user()->id && $ticket->status == 1)
            ) {

                $ticket->update(['status'=>1,'user_id'=>auth()->user()->id]);
                DB::commit();
                return view('checker.tickets.edit',compact('ticket'));
            }
            return back()->withInput()->with(['error'=>'El ticket pertenece a otro cajero o se encuentra cerraro']);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return back()->withInput()->with(['error'=>'Error Interno Intentelo de Nuevo']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
        //return $ticket;
        $request->validate(['solution'=>'required']);
        if ($ticket->displayed_on_screen == 0) {
            return back()->withInput()->with(['error'=>'No se ha visualisado en el Display']);
        }
        DB::beginTransaction();
        try {
            //code...
            $ticket->update(['status'=>2,'solution'=>$request->solution]);
            DB::commit();
            return redirect()->route('tickets.index');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return back()->withInput()->with(['error'=>'Error al Guardar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
