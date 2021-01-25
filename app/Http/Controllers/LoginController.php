<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        // return $request;
        $credentials = $request->only('enrollment', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended(auth()->user()->role_id==1?'admin':'cajero');
        }else {
            $user = User::where('enrollment',$request->enrollment)->first();
            return back()->withInput()->with(['error'=>is_null($user)?'Matricula No Encontrada':'Credenciales Incorrectas']);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
        } catch (\Throwable $th) {
            return redirect()->route('login');
        }
    }
}
