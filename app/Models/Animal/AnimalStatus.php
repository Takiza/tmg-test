<?php

namespace App\Models\Animal;

use App\Models\Animal\Traits\AnimalStatusRelations;
use Illuminate\Database\Eloquent\Model;

class AnimalStatus extends Model
{
    use AnimalStatusRelations;

    protected $fillable = [
        'name'
    ];
}
