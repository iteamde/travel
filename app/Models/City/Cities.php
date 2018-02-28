<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityRelationship;
use App\Models\City\Traits\Attribute\CityAttribute;

class Cities extends Model
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
    protected $table = 'cities';
    
    use CityRelationship,
        CityAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['countries_id', 'code', 'is_capital' , 'lat', 'lng', 'safety_degree_id', 'active'];

    /**
     * @return mixed
     **/
    public function deleteAirports(){
        self::deleteModels($this->airports);
    }

    /**
     * @return mixed
     **/
    public function deleteCurrencies(){
        self::deleteModels($this->currencies);
    }

    /**
     * @return mixed
     **/
    public function deleteTrans(){
        self::deleteModels($this->trans);
    }

    /**
     * @return mixed
     **/
    public function deleteEmergency_numbers(){
        self::deleteModels($this->emergency_numbers);
    }

    /**
     * @return mixed
     **/
    public function deleteHolidays(){
        self::deleteModels($this->holidays);
    }

    /**
     * @return mixed
     **/
    public function deleteLanguagesSpoken(){
        self::deleteModels($this->languages_spoken);
    }

    /**
     * @return mixed
     **/
    public function deleteLifestyles(){
        self::deleteModels($this->lifestyles);
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
    public function deleteReligions(){
        self::deleteModels($this->religions);
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
    
    public function trips()
    {
        return $this->belongsToMany('App\Models\TripPlans\TripPlans', 'trips_cities', 'cities_id', 'trips_id');
    }
}
