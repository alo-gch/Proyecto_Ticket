<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\People;
use App\Models\CashReceipt;
use App\Http\Requests\CheckerStoreRequest;
use DB;
use Hash;

class CheckerController extends Controller
{
    //
    public function index()
    {
        $users = User::where('role_id',2)->paginate(10);
        return view('admin.checkers.index',compact('users'));
    }

    public function create()
    {
        $cashReceipts = CashReceipt::where('id','>','1')->pluck('name','id');
        return view('admin.checkers.create',compact('cashReceipts'));
    }

    public function store(CheckerStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $people = People::create([
                'first_name'        =>$request->first_name,
                'second_name'       =>$request->second_name,
                'first_surname'     =>$request->first_surname,
                'second_surname'    =>$request->second_surname,
                'phone'             =>$request->phone,
                'cash_receipt_id'   =>$request->cash_receipt_id
            ]);

            $user = User::create([
                'email'     =>$request->email,
                'password'  =>Hash::make($request->password),
                'role_id'   =>2,
                'people_id' =>$people->id,
                'enrollment'=>$request->enrollment
            ]);

            DB::commit();
            return redirect()->route('cajeros.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return $th;
            return back()->withInput()->with(['error'=>'Error al Guardar']);
        }
    }

    public function edit($id)
    {
        $user = User::join('peoples','peoples.id','=','users.people_id')
        ->select('users.*','peoples.first_name','peoples.second_name','peoples.first_surname','peoples.second_surname','peoples.phone','peoples.cash_receipt_id')
        ->where('users.id',$id)
        ->first();

        $users = User::join('peoples','peoples.id','=','users.people_id')
        ->select('users.*','peoples.cash_receipt_id')
        ->whereNotIn('peoples.cash_receipt_id',[$user->cash_receipt_id])
        ->pluck('cash_receipt_id');

        $cashReceipts = CashReceipt::
        whereNotIn('id',$users)
        ->where('id','>','1')->pluck('name','id');

        return view('admin.checkers.edit',compact('cashReceipts','user'));
    }

    public function update(User $cajero, CheckerStoreRequest $request)
    {

        DB::beginTransaction();
        try {
            $cajero->people->update([
                'first_name'        =>$request->first_name,
                'second_name'       =>$request->second_name,
                'first_surname'     =>$request->first_surname,
                'second_surname'    =>$request->second_surname,
                'phone'             =>$request->phone,
                'cash_receipt_id'   =>$request->cash_receipt_id
            ]);
            $password = $cajero->password;
            if( $request->password != null){
              $password = Hash::make($request->password);
            }

            $cajero->update([
                'email'     =>$request->email,
                'password'  => $password,
                'enrollment'=>$request->enrollment
            ]);

            DB::commit();
            return redirect()->route('cajeros.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return $th;
            return back()->withInput()->with(['error'=>'Error al Actualizar']);
        }
    }
}
