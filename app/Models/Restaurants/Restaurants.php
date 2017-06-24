<?php

namespace App\Models\Restaurants;

use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurants\Traits\Relationship\RestaurantsRelationship;
use App\Models\Restaurants\Traits\Attribute\RestaurantsAttribute;

class Restaurants extends Model
{
    CONST ACTIVE    = 1;
    CONST DEACTIVE  = 2;

    CONST IS_CAPITAL     = 1;
    CONST IS_NOT_CAPITAL = 2;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'restaurants';
    
    use RestaurantsRelationship,
        RestaurantsAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['countries_id', 'cities_id' , 'places_id' , 'lat', 'lng', 'active'];

    /**
     * @return mixed
     **/
    public function deleteTrans(){
        self::deleteModels($this->trans);
    }

    /**
     * @return mixed
     **/
    public function deleteMedias(){
        self::deleteModels($this->medias);
    }

    /**
     * @return mixed
     **/
    public function deleteModels($models){
        if(!empty($models)){
            foreach ($models as $key => $value) {
                $value->delete();
            }
        }
    }
}
