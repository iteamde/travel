<?php

namespace App\Models\Pages\Traits\Relationship;

use App\Models\User\User;

/**
 * Class PagesAdminsRelationship.
 */
trait PagesAdminsRelationship
{
    public function user(){
    	return $this->hasOne(User::class , 'id' , 'users_id');
    }
}
