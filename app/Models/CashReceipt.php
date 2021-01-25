<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashReceipt extends Model
{
    protected $table = 'cash_receipts';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function peoples()
    {
        return $this->hasMany(People::class, 'cash_receipt_id', 'id');
    }
}
