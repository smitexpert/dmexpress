<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'marchent_id',
        'amount',
        'charge',
        'marchent_payment_detail_id',
        'issued_by',
    ];

    public function parcels()
    {
        return $this->hasMany(PaymentInvoiceItem::class, 'payment_invoice_id', 'id');
    }

    public function marchent()
    {
        return $this->hasOne(Marchent::class, 'id', 'marchent_id');
    }

    public function payment()
    {
        return $this->hasOne(MarchentPaymentDetails::class, 'id', 'marchent_payment_detail_id');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'issued_by');
    }
}
