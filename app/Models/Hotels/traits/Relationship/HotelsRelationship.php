<?php

namespace App\Models\Hotels\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\Country\Countries;
use App\Models\City\Cities;
use App\Models\Place\Place;

/**
 * Class HotelsRelationship.
 */
trait HotelsRelationship
{
    /**
     * Many-to-Many relations with CountriesTrans.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        return $this->hasMany(config('hotels.hotels_trans'), 'hotels_id');
    }

    public function transsingle()
    {   
        return $this->hasOne(config('hotels.hotels_trans'), 'hotels_id');
    }

    /**
     * @return mixed
     */
    public function country()
    {
        return $this->hasOne(Countries::class , 'id' , 'countries_id');
    }

    /**
     * @return mixed
     */
    public function city()
    {
        return $this->hasOne(Cities::class , 'id' , 'cities_id');
    }

    /**
     * @return mixed
     */
    public function type()
    {
        return $this->hasOne(PlaceTypes::class , 'id' , 'place_type_ids');
    }

    /**
     * @return mixed
     */
    public function place()
    {
        return $this->hasOne(Place::class , 'id' , 'places_id');
    }

    /**
     * @return mixed
     */
    public function medias()
    {
        return $this->hasMany(config('hotels.hotels_medias') , 'hotels_id');
    }
}
