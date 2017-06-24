<?php

namespace App\Models\Restaurants\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Country\Countries;
use App\Models\City\Cities;
use App\Models\Place\Place;

/**
 * Class RestaurantsRelationship.
 */
trait RestaurantsRelationship
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('access.role'), config('access.role_user_table'), 'user_id', 'role_id');
    }

    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialLogin::class);
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
    public function place()
    {
        return $this->hasOne(Place::class , 'id' , 'places_id');
    }

    /**
     * Many-to-Many relations with CitiesTrans.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('restaurants.restaurants_trans'), 'restaurants_id');
    }

    public function transsingle()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(config('restaurants.restaurants_trans'), 'restaurants_id');
    }


}
