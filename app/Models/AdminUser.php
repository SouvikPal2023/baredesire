<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';
    
    protected $fillable = ['name','email','mobile','status'];
    
    protected $hidden = ['password','remember_token'];
}
