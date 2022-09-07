<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';
    protected $fillable=[
        'name',
        'price',
        'slug',
        'description',
        'photo',
        'store_id'
    ];

    public function Store(){
        return $this->belongsTo(Store::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
