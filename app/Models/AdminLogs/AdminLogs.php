<?php

namespace App\Models\AdminLogs;

use Illuminate\Database\Eloquent\Model;

class AdminLogs extends Model
{
    protected $fillable = ['item_type', 'item_id', 'action', 'time', 'admin_id'];
    public $timestamps = false;
}
