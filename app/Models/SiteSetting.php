<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_logo',
        'light_logo',
        'favicon',
        'footer_text',
        'copyright_text',
        'meta_title',
        'meta_keyword',
        'meta_description',
        
        'site_email',
        'site_phone',
        'site_whatsapp',
        'contact_title',
        'address',
        'map_link',
       
    ];



    public function getSiteLogoAttribute($value)
    {
        if (Str::contains(Request()->route()->getPrefix(), 'api')) {
           //return asset('storage/'.$value);
           return config("app.url").Storage::url($value);
        }
        return $value;
    }

    public function getLightLogoAttribute($value)
    {
        if (Str::contains(Request()->route()->getPrefix(), 'api')) {
           return config("app.url").Storage::url($value);
        }
        return $value;
    }

    public function getFaviconAttribute($value)
    {
        if (Str::contains(Request()->route()->getPrefix(), 'api')) {
           return config("app.url").Storage::url($value);
        }
        return $value;
    }

    public function getPartnerImage1Attribute($value)
    {
        if (Str::contains(Request()->route()->getPrefix(), 'api')) {
           return config("app.url").Storage::url($value);
        }
        return $value;
    }

    public function getPartnerImage2Attribute($value)
    {
        if (Str::contains(Request()->route()->getPrefix(), 'api')) {
           return config("app.url").Storage::url($value);
        }
        return $value;
    }
}
