<?php


namespace App\Models\Animal\Traits;


use App\Models\Animal\AnimalStatus;

trait AnimalStatusRelations
{
    public function animals()
    {
        return $this->hasMany(AnimalStatus::class, 'status_id', 'id');
    }
}
