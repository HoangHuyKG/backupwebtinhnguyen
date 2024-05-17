<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateofmeeting',
        'location',
        'time',
        'fund',
        'quantity',
        'attendance',
        'payment',
    ];
}
