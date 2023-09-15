<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home4Section extends Model
{
    use HasFactory;

    protected $fillable = [
       'heading',

       'image1',
       'image1_text',
       'btn1_text',
       'btn1_url',

       'image2',
       'image2_text',
       'btn2_text',
       'btn2_url',
        ];
}
