<?php


namespace App\Models\Animal\Traits;


use App\Models\Animal\AnimalStatus;
use App\Models\Animal\AnimalType;

trait AnimalRelations
{
    public function type()
    {
        return $this->hasOne(AnimalType::class, 'id', 'type_id');
    }

    public function status()
    {
        return $this->hasOne(AnimalStatus::class, 'id', 'status_id');
    }
}
