<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'studentcode',
        'teammembercode',
        'fullname',
        'sex',
        'birthday',
        'dateonteam',
        'class',
        'course',
        'branch',
        'numberphone',
        'email',
        'role',
        'numberofactivity',
        'image',
    ];
}

class Users extends Authenticatable
{


    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'studentcode',
        'teammembercode',
        'fullname',
        'sex',
        'birthday',
        'dateonteam',
        'class',
        'course',
        'branch',
        'numberphone',
        'email',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];


}

