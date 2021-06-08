<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    protected $fillable = [
        'marchent_id',
        'area_type_id',
        'area_id',
        'phone',
        'address',
    ];

    public function marchent()
    {
        return $this->hasOne(Marchent::class, 'marchent_id', 'id');
    }

    public function areaType()
    {
        return $this->hasOne(AreaType::class, 'id', 'area_type_id');
    }

    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'area_id');
    }
}
