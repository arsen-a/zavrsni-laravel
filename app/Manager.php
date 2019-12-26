<?php

namespace App;

use App\Shop;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $guarded = ['id'];

    public function shop() 
    {
        return $this->hasOne(Shop::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
