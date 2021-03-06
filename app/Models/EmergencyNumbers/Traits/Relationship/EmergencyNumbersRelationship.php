<?php

namespace App\Models\EmergencyNumbers\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Weekdays\Weekdays;
use App\Models\SafetyDegree\SafetyDegree;

/**
 * Class EmergencyNumbersRelationship.
 */
trait EmergencyNumbersRelationship
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
     * Many-to-Many relations with TimingsTrans.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        return $this->hasMany(config('emergencynumbers.emergencynumbers_trans'), 'emergency_numbers_id' , 'id');
    }

    public function transsingle()
    {
        return $this->hasOne(config('emergencynumbers.emergencynumbers_trans'), 'emergency_numbers_id' , 'id');
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
