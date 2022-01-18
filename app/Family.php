<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
class Family extends Model
{
    protected  $guarded;
    use PowerJoins;
    public function animals(){

          return $this->hasMany(Animal::class,'family_id');
    }


    public function families()
    {
        return $this->hasMany(Family::class);
    }

    public function childrenFamilies()
    {
        return $this->hasMany(Family::class)->with('families');
    }


    public static function tree(){

        $allFamilies = Family::get();
        $rootFamilies = $allFamilies->whereNull('family_id');
        self::formatTree($rootFamilies,$allFamilies);
        return $rootFamilies;
    }


    private static function formatTree($families,$allFamilies){

        foreach ($families as $family){
            $family->childrenFamilies = $allFamilies->where('family_id',"=",$family->id)->values();

            if(!empty($family->childrenFamilies)){
                self::formatTree($family->childrenFamilies,$allFamilies);
            }
          /*  foreach($family->childrenFamilies as $child){

                $child->childrenFamilies = $allFamilies->where('family_id','=',$child->id)->values();
            }
          */
        }
    }
}
