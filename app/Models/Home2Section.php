<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home2Section extends Model
{
    use HasFactory;

    protected $fillable = [
       'image1',
        'btn1_text',
       'btn1_image',
        'btn1_url',

       'image2',
        'btn2_text',
       'btn2_image',
        'btn2_url',

       'image3',
        'btn3_text',
       'btn3_image',
        'btn3_url',
        
       'image4',
        'btn4_text',
       'btn4_image',
        'btn4_url',
       ];
}
