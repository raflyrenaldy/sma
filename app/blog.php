<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $fillable = [
        'foto','title', 'body',
    ];
}
