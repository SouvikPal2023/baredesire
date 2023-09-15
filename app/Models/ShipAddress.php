<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
            'last_name',
            'email',
            'mobile',
            'billing_address_line1',
            'billing_address_line2',
            'billing_city',
            'billing_state',
            'billing_zip',
            'billing_country',
            'shipping_address_line1',
            'shipping_address_line2',
            'shipping_city',
            'shipping_state',
            'shipping_zip',
            'shipping_country',
         
    ];
}
