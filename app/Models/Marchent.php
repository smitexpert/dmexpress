<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Marchent extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'marchent',
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

    public function address()
    {
        return $this->hasMany(Pickup::class, 'marchent_id', 'id');
    }

    public function parcels()
    {
        return $this->hasMany(Parcel::class, 'marchent_id', 'id');
    }

    public function parcel()
    {
        return $this->hasOne(Parcel::class, 'marchent_id', 'id');
    }

    public function paymentDetails()
    {
        return $this->hasMany(MarchentPaymentDetails::class, 'marchent_id', 'id');
    }

    public function payoutMethod()
    {
        return $this->hasOne(MarchentPaymentDetails::class, 'marchent_id', 'id')->where('active', true);
    }

}
