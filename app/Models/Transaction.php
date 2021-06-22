<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
        protected $fillable = [
        'users_id', 
        'total_price',
        'transaction_status',
        'name',
        'email',
        'address_one',
        'address_two',
        'zip_code',
        'province',
        'phone',
        'city',
        'code',
    ];

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo( User::class, 'users_id', 'id');
    }
}
