<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone_id',
        'area_id'
    ];
}
