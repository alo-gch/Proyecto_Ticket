<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttentionSchedule extends Model
{
    protected $table = 'attention_schedules';
    protected $primaryKey = 'id';
    protected $fillable = ['start','end'];
}
