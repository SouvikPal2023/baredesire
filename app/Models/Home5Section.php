<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home5Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
          'desc',
        'image',
        
        'btn_text',
        'btn_url',
 
       
         ];
}
