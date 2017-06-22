<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pages\Traits\Relationship\PagesMediasRelationship;

class PagesMedias extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages_medias';

    public $timestamps = false;

    use PagesMediasRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pages_ids', 'medias_ids'];
}
