<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class Animal extends Model
{
    protected $guarded;

    use PowerJoins;


    public function family()
    {

        return $this->belongsTo(Family::class, 'family_id');
    }

    public function continents()
    {

        return $this->belongsToMany(Continent::class, 'animals_continents', 'animal_id', 'continent_id')
            ->withPivot(['infos','description']);
    }
}
