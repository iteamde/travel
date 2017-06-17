<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country\Traits\Relationship\CountriesRelationship;
use App\Models\Country\Traits\Attribute\CountryAttribute;

class Countries extends Model
{
    CONST ACTIVE    = 1;
    CONST DEACTIVE  = 2;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;
    
    use CountriesRelationship,
        CountryAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['region_id', 'code', 'lat', 'lng', 'safety_degree', 'active'];

    public function deleteTrans(){
        self::deleteModels($this->trans);
    }

    public function deleteAirports(){
        self::deleteModels($this->airports);
    }

    public function deleteCurrencies(){
        self::deleteModels($this->currencies);
    }

    public function deleteCapitals(){
        self::deleteModels($this->capitals);
    }

    public function deleteEmergencyNumbers(){
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

    public function deleteReligions(){
        self::deleteModels($this->religions);
    }

    public function deleteModels($models){
        if(!empty($models)){
            foreach ($models as $key => $value) {
                $value->delete();
            }
        }
    }
}
