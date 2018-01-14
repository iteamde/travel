<?php

namespace App\Models\Place\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\Country\Countries;
use App\Models\City\Cities;
use App\Models\PlaceTypes\PlaceTypes;
use App\Models\Place\PlaceMedias;
use App\Models\ActivityMedia\Media;


/**
 * Class PlaceRelationship.
 */
trait PlaceRelationship
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
        return $this->hasMany(config('locations.place_trans'), 'places_id');
    }

    public function transsingle()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(config('locations.place_trans'), 'places_id');
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
    public function degree()
    {
        return $this->hasOne(SafetyDegree::class , 'id' , 'safety_degrees_id');
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * @return mixed
     */
    public function medias()
    {
        return $this->hasMany(PlaceMedias::class , 'places_id' , 'id');
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
