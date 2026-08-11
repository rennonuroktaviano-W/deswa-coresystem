<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investigator extends Model
{
    protected $table = 'investigators';

    protected $guarded = [];

    public function investigasis()
    {
        return $this->hasMany(Investigasi::class, 'investigator_id');
    }
}