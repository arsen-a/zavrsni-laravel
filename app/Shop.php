<?php

namespace App;

use App\Manager;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = ['id'];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}
