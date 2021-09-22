<?php

namespace App\Models\Animal;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'age',
        'type_id'
    ];
}
