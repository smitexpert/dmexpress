<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
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
        'remember_token'
    ];

    public function parcels()
    {
        return $this->hasMany(Parcel::class, 'hero_id', 'id');
    }
}
