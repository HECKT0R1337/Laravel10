<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [ 'name'];

    public function comment(){
        return $this->morphOne(Comment::class,'commentable');
    }

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function ptags(){
        return $this->morphToMany(Ptag::class,'taggable');
    }


}
