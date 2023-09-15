<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
      'original_price', 
      'selling_price', 
        'description',
        'wash',
        'additional',
        'color_id'
     ];
 
     public function product_categories(){
      return $this->belongsToMany(ProductCategory::class , 'product_product_category')->withPivot('created_at');
  }

  public function product_sizes(){
   return $this->belongsToMany(ProductSize::class , 'product_product_size')->withPivot('created_at');
}

public function product_images(){
   return $this->hasMany(ProductImage::class);
}
public function color()
{
    return $this->belongsTo(Color::class);
}

public function variations(){
   return $this->belongsToMany(Product::class , 'variations' ,'product_id','parent_id')->withPivot('created_at');
}

public function parentProducts()
    {
        return $this->belongsToMany(Product::class, 'variations', 'parent_id', 'product_id')->withPivot('created_at');
           
    }

    public function users(){
        return $this->belongsToMany(User::class , 'carts')->withPivot('quantity','created_at');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity','size', 'subtotal')
        ->withTimestamps();
    }

    public function reviews(){
        return $this->hasMany(Review::class);
     }
   
}