<?php

namespace App\Models\Animal;

use App\Models\Animal\Traits\AnimalTypeRelations;
use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    use AnimalTypeRelations;

    protected $fillable = [
        'name'
    ];
}
