<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pages\Traits\Relationship\PagesTransRelationship;

class PagesTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages_trans';

    public $timestamps = false;

    use PagesTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pages_id', 'languages_id', 'title' , 'description'];
}
