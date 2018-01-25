<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\ActivityMedia\Media;

/**
 * Class UserRelationship.
 */
trait CountriesRelationship
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
     * Many-to-Many relations with CountriesTrans.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_trans'), 'countries_id');
    }

    public function transsingle()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(config('locations.country_trans'), 'countries_id');
    }

    /**
     * @return mixed
     */
    public function region()
    {
        return $this->hasOne(Regions::class , 'id' , 'regions_id');
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
     * Many-to-Many relations with CountriesAirports.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function airports()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_airports_trans'), 'countries_id');
    }

    /**
     * Many-to-Many relations with CountriesCurrencies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function currencies()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_currencies_trans'), 'countries_id');
    }

    /**
     * Many-to-Many relations with CountriesCapitals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function capitals()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_capitals_trans'), 'countries_id');
    }

    /**
     * Many-to-Many relations with CountriesEmergencyNumbers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function emergency_numbers()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_emergency_numbers_trans'), 'countries_id');
    }

    /**
     * Many-to-Many relations with CountriesHolidays.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function holidays()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_holidays_trans'), 'countries_id');
    }

    /**
     * Many-to-Many relations with CountriesLanguagesSpoken.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function languages_spoken()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_languages_spoken_trans'), 'countries_id');
    }

    /**
     * Many-to-Many relations with CountriesAdditionalLanguagesSpoken.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function additional_languages_spoken()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_additional_languages_spoken'), 'countries_id');
    }

    /**
     * Many-to-Many relations with CountriesLifestyles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lifestyles()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_lifestyles_trans'), 'countries_id');
    }

    /**
     * Many-to-Many relations with CountriesMedias.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function medias()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_medias_trans'), 'countries_id');
    }

    /**
     * Many-to-Many relations with CountriesReligions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function religions()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.country_religions_trans'), 'countries_id');
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
