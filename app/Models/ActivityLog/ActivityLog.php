<?php

namespace App\Models\ActivityLog;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_log';
    public $timestamps = false;
    protected $fillable = ['users_id', 'type', 'action', 'time', 'permission'];
}
