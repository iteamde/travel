<?php

namespace App\Models\City\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Country\Countries;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\ActivityMedia\Media;

/**
 * Class CityRelationship.
 */
trait CityRelationship
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
     * Many-to-Many relations with CitiesTrans.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.cities_trans'), 'cities_id');
    }

    public function transsingle()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(config('locations.cities_trans'), 'cities_id');
    }

    /**
     * Many-to-Many relations with CitiesAirports.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function airports()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.cities_airports_trans'), 'cities_id');
    }

    /**
     * Many-to-Many relations with CitiesCurrencies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function currencies()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.cities_currencies_trans'), 'cities_id');
    }

    /**
     * Many-to-Many relations with CitiesNumbers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function emergency_numbers()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.cities_emergency_numbers_trans'), 'cities_id');
    }

    /**
     * Many-to-Many relations with CitiesNumbers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function holidays()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.cities_holidays_trans'), 'cities_id');
    }

    /**
     * Many-to-Many relations with CitiesLifestyles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lifestyles()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.cities_lifestyles_trans'), 'cities_id');
    }

    /**
     * Many-to-Many relations with CitiesNumbers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function languages_spoken()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.cities_languages_spoken_trans'), 'cities_id');
    }

    /**
     * Many-to-Many relations with CitiesAdditionalLanguages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function additional_languages_spoken()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.cities_additional_languages_spoken'), 'cities_id');
    }

    /**
     * Many-to-Many relations with CitiesMedias.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function medias()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.cities_medias_trans'), 'cities_id');
    }

    /**
     * Many-to-Many relations with CitiesReligions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function religions()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.cities_religions_trans'), 'cities_id');
    }

    /**
     * @return mixed
     */
    public function degree()
    {
        return $this->hasOne(SafetyDegree::class , 'id' , 'safety_degree_id');
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * One-to-One relations with Medias.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToOne
     */
    public function cover()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne( Media::class, 'id', 'cover_media_id');
    }
}
