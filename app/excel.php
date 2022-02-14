<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class excel extends Model
{
    protected $fillable = [
        'numeroA', 'numeroB', 'llamada' ,'coordenadaA' ,'coordenadaB', 'radio_baseA','radio_baseB','fecha','tiempo',
    ];
}

