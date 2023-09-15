<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home7Section extends Model
{
    use HasFactory;

    protected $fillable = [
       'image',
       'heading',
       'desc',
       'btn_text',
       'btn_url',
          ];
}
