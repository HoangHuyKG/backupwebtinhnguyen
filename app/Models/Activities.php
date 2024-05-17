<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameactivity',
        'content',
        'limit',
        'method',
        'location',
        'time',
        'skin',
        'active_attend',
        'active_register',
    ];
}


