<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking',
        'marchent_id',
        'pickup_id',
        'area_type_id',
        'area_id',
        'marchent_invoice_no',
        'collection',
        'product_price',
        'weight',
        'cod',
        'charge',
        'customer_name',
        'customer_phone',
        'address',
        'status_id',
        'delivery_at',
        'attempt',
        'hero_id',
        'updated_by',
    ];

    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'area_id');
    }

    public function hero()
    {
        return $this->hasOne(Hero::class, 'id', 'hero_id');
    }

    public function marchent()
    {
        return $this->hasOne(Marchent::class, 'id', 'marchent_id');
    }

    public function status()
    {
        return $this->hasOne(ParcelStatus::class, 'id', 'status_id');
    }

    public function pickup()
    {
        return $this->hasOne(Pickup::class, 'id', 'pickup_id');
    }

    public function type()
    {
        return $this->hasOne(AreaType::class, 'id', 'area_type_id');
    }

    public function timeline()
    {
        return $this->hasMany(ParcelTimeline::class, 'parcel_id', 'id');
    }

    public function invoice()
    {
        return $this->hasOne(PaymentInvoiceItem::class, 'parcel_id', 'id');
    }

}
