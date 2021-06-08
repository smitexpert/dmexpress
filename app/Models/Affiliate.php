<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'password',
        'status',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
