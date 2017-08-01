<?php

namespace App\Models\AdminLogs;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\User\User;

class AdminLogs extends Model
{
    protected $fillable = ['item_type', 'item_id', 'action', 'query', 'time', 'admin_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('User', 'admin_id');
    }
}
