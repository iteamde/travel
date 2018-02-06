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
    protected $table = 'countries';
    
    use CountriesRelationship,
        CountryAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['region_id', 'code', 'iso_code', 'lat', 'lng', 'safety_degree', 'active'];

    /**
     * @return mixed
     **/
    public function deleteTrans(){
        self::deleteModels($this->trans);
    }

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
    public function deleteCapitals(){
        self::deleteModels($this->capitals);
    }

    /**
     * @return mixed
     **/
    public function deleteEmergencyNumbers(){
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
}
