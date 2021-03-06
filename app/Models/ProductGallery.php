<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;
    protected $table = 'product_galleries';
    protected $fillable = [
        'Photos','Products_id',
    ];


       public function product(){
        return $this->belongsTo(Product::class, 'Products_id', 'id');
    }
}


