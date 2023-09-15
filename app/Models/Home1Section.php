<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home1Section extends Model
{
    use HasFactory;
    protected $fillable = [
       'heading',
           'sub_heading',
           'description',
           'image1',
           'image2',
           'image3',
           'btn1_text',
           'btn1_url',
           'btn2_text',
           'btn2_url',
      ];

}
