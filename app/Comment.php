<?php

namespace App;

use App\Shop;
use App\Manager;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}
