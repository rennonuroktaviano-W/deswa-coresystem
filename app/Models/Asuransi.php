<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    protected $table = 'asuransis';

    protected $guarded = [];

    public function investigasis()
    {
        return $this->hasMany(Investigasi::class, 'asuransi_id');
    }
}