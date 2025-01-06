<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'payment_status',
        'transaction_id',
        'qr_code',
        'payment_url',
        'payment_date',
        'payment_confirmed'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
