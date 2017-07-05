<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}