<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'ProductName',
        'Price',
        'Description',
        'Image',
        'Categories',
        'Weight'
    ];

     public function galleries(){
        return $this->hasMany( ProductGallery::class, 'Products_id', 'id' );
    }
        public function user(){
        return $this->hasOne( User::class, 'id', 'users_id');
    }
}
