<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityRelationship;
use App\Models\City\Traits\Attribute\CityAttribute;

class Cities extends Model
{
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

    public function deleteAirports(){
        self::deleteModels($this->airports);
    }

    public function deleteCurrencies(){
        self::deleteModels($this->currencies);
    }

    public function deleteTrans(){
        self::deleteModels($this->trans);
    }

    public function deleteEmergency_numbers(){
        self::deleteModels($this->emergency_numbers);
    }

    public function deleteHolidays(){
        self::deleteModels($this->holidays);
    }

    public function deleteLanguagesSpoken(){
        self::deleteModels($this->languages_spoken);
    }

    public function deleteLifestyles(){
        self::deleteModels($this->lifestyles);
    }

    public function deleteMedias(){
        self::deleteModels($this->medias);
    }

    public function deleteModels($models){
        if(!empty($models)){
            foreach ($models as $key => $value) {
                $value->delete();
            }
        }
    }
}
