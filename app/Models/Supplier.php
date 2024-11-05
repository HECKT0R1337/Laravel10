<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table='suppliers';
    protected $fillable=['name'];




    public function order(){
        return $this->hasOneThrough(Order::class,Item::class,'supplier_id','item_id');
    }


    public function orders(){
        return $this->hasManyThrough(Order::class,Item::class,'supplier_id','item_id');
    }


}
