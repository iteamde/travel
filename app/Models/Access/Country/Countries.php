<?php

namespace App\Models\Access\Country;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Country\Traits\Relationship\CountriesRelationship;
class Countries extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;
    
    use CountriesRelationship;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['region_id', 'code', 'lat', 'lng', 'safety_degree', 'active'];
}
