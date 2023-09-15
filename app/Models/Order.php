<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
       'order_number',
        'user_id',
       'total_price',
       'coupon_code',
       'payment_status',
       'payment_method',
       'shipping_method',
       'tracking_number',
       'notes',
       'status', 
       'cancelled_at',
     ];

     public function user()
{
    return $this->belongsTo(User::class);
}

public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity','size', 'subtotal')
        ->withTimestamps();
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->order_number = static::generateUniqueOrderNumber();
        });
    }

    protected static function generateUniqueOrderNumber()
    {
        $timestamp = now()->format('YmdHis'); // Current date and time
        $random = mt_rand(1000, 9999); // Random 4-digit number

        return $timestamp . $random;
    }
}
