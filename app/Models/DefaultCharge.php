<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_type_id',
        'cod',
        'charge',
        'additional_charge',
    ];
}
