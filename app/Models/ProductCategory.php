<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'parent_id',
       'level', 
       'banner_image', 
         
      ];

     

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    public function parent()
{
    return $this->belongsTo(ProductCategory::class, 'parent_id');
}
public function products(){
    return $this->belongsToMany(Product::class , 'product_product_category')->withPivot('created_at');
}
}