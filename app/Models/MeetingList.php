<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingList extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_meeting',
        'status_payment',
        'status_attendance',
    ];
}
