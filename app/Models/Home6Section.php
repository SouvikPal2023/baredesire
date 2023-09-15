<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home6Section extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'heading',
        'sub_heading',

       'image1',
        'image1_heading',
        'image1_text',

       'image2',
        'image2_heading',
        'image2_text',

       'image3',
        'image3_heading',
        'image3_text',

       'image4',
        'image4_heading',
        'image4_text',
          ];
}
