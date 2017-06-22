<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role\Traits\RoleAccess;
use App\Models\Role\Traits\Scope\RoleScope;
use App\Models\Role\Traits\Relationship\RoleUserRelationship;

/**
 * Class RoleUser.
 */
class RoleUser extends Model
{
    use RoleUserRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'role_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'role_id'];
}
