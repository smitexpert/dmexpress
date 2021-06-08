<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function charges()
    {
        return $this->hasOne(DefaultCharge::class, 'area_type_id', 'id');
    }
}
