<?php

namespace App;

use App\Manager;
use App\Article;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = ['id'];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function articles() 
    {
        return $this->hasMany(Article::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }
}
