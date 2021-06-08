<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateMarchent extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_id',
        'marchent_id'
    ];
}
