<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'name'
    ];

    public function type()
    {
        return $this->hasOne(AreaType::class, 'id', 'type_id');
    }

    public function zone()
    {
        return $this->hasOneThrough(Zone::class, ZoneArea::class, 'area_id', 'id', 'id', 'zone_id');
    }


}
