<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CheckerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            //
            'first_name'        =>'required|string|max:50',
            'second_name'       =>is_null($request->second_name)?'':'string|max:50',
            'first_surname'     =>'required|string|max:50',
            'second_surname'    =>is_null($request->second_surname)?'':'string|max:50',
            'phone'             =>'required|string|max:10',
            'cash_receipt_id'   =>'required|integer',
            'email'             =>'required|email|max:150',
            'password'          =>\Request::route()->getName()=='cajeros.update'?'':'required',
            'enrollment'        =>\Request::route()->getName()=='cajeros.update'?'required|integer|unique:users,enrollment,'.$request->id:'required|integer|unique:users,enrollment'
        ];
    }
}
