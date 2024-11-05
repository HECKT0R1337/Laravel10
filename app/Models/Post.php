<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class, 'user_id', 'id');

    }

    public function comment(){
        return $this->morphOne(Comment::class,'commentable');
    }

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }



}

/*
    how to use tinker to create row
    php artisan tinker
    \App\Models\Post::create(['title' => 'my first title', 'content' => 'my content1','user_id' => 1])

     \DB::table('post_tag')->insert(['post_id'=>1,'tag_id'=>1]);
     
*/

