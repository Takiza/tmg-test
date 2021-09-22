<?php


namespace App\Models\Animal\Traits;


use App\Models\Animal\AnimalType;

trait AnimalTypeRelations
{
    public function animals()
    {
        return $this->hasMany(AnimalType::class, 'type_id', 'id');
    }
}
