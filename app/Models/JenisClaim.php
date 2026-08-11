<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisClaim extends Model
{
    protected $table = 'jenis_claims';

    protected $guarded = [];

    public function investigasis()
    {
        return $this->hasMany(Investigasi::class, 'jenisclaim_id');
    }
}