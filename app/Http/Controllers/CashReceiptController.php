<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashReceipt;
use DB;

class CashReceiptController extends Controller
{
    //
    public function index()
    {
        $cashReceipt = CashReceipt::where('id','>',1)->paginate(10);
        return view('admin.cash-receipt.index',compact('cashReceipt'));
    }
    
    public function create()
    {
        return view('admin.cash-receipt.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate(['name'=>'required']);
            $cashReceipt = CashReceipt::create(['name'=>$request->name]);
            DB::commit();
            return redirect()->route('cajas.index');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return back()->withInput()->with(['error'=>'Error al Guardar']);
        }
    }

    public function edit(CashReceipt $caja)
    {
        return view('admin.cash-receipt.edit',compact('caja'));
    }

    public function update(CashReceipt $caja, Request $request)
    {
        $request->validate(['name'=>'required']);
        DB::beginTransaction();
        try {
            $caja->update(['name'=>$request->name]);
            DB::commit();
            return redirect()->route('cajas.index');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return back()->withInput()->with(['error'=>'Error al Guardar']);
        }
    }
}
