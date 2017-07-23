<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

class PagesNotificationSettings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages_notification_settings';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pages_id', 'var', 'val'];
}