<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function areas()
    {
        return $this->hasManyThrough(Area::class, ZoneArea::class, 'zone_id', 'id', 'id', 'area_id');
    }
}
