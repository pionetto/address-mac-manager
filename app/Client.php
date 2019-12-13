<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // public $timestamps = true;

    public function devices()
    {
        return $this->hasMany(Device::class);
    }
    
}