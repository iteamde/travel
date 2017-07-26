<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 * package App.
 */
class Session extends Model
{
    const ONLINE_STATUS_SHOW = 1;
    const ONLINE_STATUS_HIDE = 2;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * @var array
     */
    // protected $guarded = ['*'];

    public $timestamps = false;

    public $incrementing = false;
}
