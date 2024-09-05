<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'merchant_id',
        'schedule',
        'status',
        'reason',
        'total',
        'payment',
    ];

    function detail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
