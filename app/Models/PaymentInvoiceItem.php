<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PaymentInvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_invoice_id',
        'parcel_id',
        'collection',
        'payable',
        'charge',
    ];

    public function parcel()
    {
        return $this->hasOne(Parcel::class, 'id', 'parcel_id');
    }
}
