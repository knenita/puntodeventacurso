<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'email','document','address','phone'
    ];
       //un proveedor tiene muchos productos
       public function products(){
        return $this->hasMany(Product::class);
    }
}
