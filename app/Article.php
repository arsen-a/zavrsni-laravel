<?php

namespace App;

use App\Shop;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = ['id'];

    public function shop() 
    {
        return $this->belongsTo(Shop::class);
    }
}
