<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterLists extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_activity',
        'note',
        'status_register',
        'status_attendance',
    ];
}
