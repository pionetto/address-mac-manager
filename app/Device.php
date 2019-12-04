<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['client_id','name', 'type', 'enable', 'device'];
}
