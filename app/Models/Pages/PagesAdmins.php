<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pages\Traits\Relationship\PagesAdminsRelationship;

class PagesAdmins extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages_admins';

    public $timestamps = false;

    use PagesAdminsRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pages_id', 'users_id'];
}
