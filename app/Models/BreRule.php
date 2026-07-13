<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreRule extends Model
{
    protected $fillable = [
        'field',
        'operator',
        'value',
        'message'
    ];
}