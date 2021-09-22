<?php


namespace App\Models\User\Traits;


use App\Models\Animal\Animal;

trait UserRelations
{
    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'user_animals', 'user_id',  'animal_id');
    }
}
