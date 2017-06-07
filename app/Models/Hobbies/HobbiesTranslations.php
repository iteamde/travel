<?php

namespace App\Models\Hobbies;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hobbies\Traits\Relationship\HobbiesTransRelationship;

class HobbiesTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_hobbies_trans';

    public $timestamps = false;

    use HobbiesTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hobbies_id', 'languages_id', 'title'];
}
