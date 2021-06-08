<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarchentCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'marchent_id',
        'area_type_id',
        'cod',
        'charge',
        'additional_charge'
    ];

    public function type()
    {
        return $this->hasOne(AreaType::class, 'id', 'area_type_id');
    }
}
