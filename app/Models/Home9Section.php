<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home9Section extends Model
{
    use HasFactory;

    protected $fillable = [
       'image1',
       'image2',
       'image3',
       'url1',
       'url2',
       'url3',
           ];
}
