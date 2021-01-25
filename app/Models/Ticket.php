<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';
    protected $fillable = ['type','solution','user_id','type_ticket_id','status','displayed_on_screen'];

    public function type()
    {
        return $this->belongsTo(TypeTicket::class, 'type_ticket_id', 'id');
    }
}
