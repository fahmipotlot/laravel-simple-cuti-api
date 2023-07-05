<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $guarded = [];

    public function approvedBy()
    {
        return $this->hasOne('App\Models\User', 'id', 'approved_by');
    }
}
