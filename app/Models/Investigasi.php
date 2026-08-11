<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investigasi extends Model
{
    protected $table = 'investigasis';

    protected $guarded = [];

    public function asuransi()
    {
        return $this->belongsTo(Asuransi::class, 'asuransi_id');
    }

    public function jenisClaim()
    {
        return $this->belongsTo(JenisClaim::class, 'jenisclaim_id');
    }

    public function investigator()
    {
        return $this->belongsTo(Investigator::class, 'investigator_id');
    }
}