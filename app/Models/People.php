<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'peoples';
    protected $primaryKey = 'id';
    protected $fillable = ['first_name','second_name','first_surname','second_surname','phone','cash_receipt_id'];

    public function cashReceipt()
    {
        return $this->belongsTo(CashReceipt::class, 'cash_receipt_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'people_id');
    }
}
