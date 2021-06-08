<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarchentPaymentDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'marchent_id',
        'type',
        'name',
        'account_number',
        'bank_name',
        'branch_name',
        'account_name',
        'account_type',
        'active',
    ];
}
