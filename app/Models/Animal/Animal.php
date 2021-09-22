<?php

namespace App\Models\Animal;

use App\Models\Animal\Traits\AnimalRelations;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use AnimalRelations;

    protected $fillable = [
        'name',
        'age',
        'type_id'
    ];
}
