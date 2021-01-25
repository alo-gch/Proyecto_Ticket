<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTicket extends Model
{
    protected $table = 'type_tickets';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
