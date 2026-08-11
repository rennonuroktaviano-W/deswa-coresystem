<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investigasi extends Model
{
    protected $table = 'investigasis';

    protected $fillable = [
        // Identitas case
        'no_case',
        'number_case',
        'tgl_registrasi',

        // Polis
        'no_polis',
        'nm_tertanggung',
        'nm_pemegang_polis',
        'nm_agen',

        // Nilai
        'uang_pertanggungan',
        'premi',
        'total_premi',
        'jml_klaim',

        // Tanggal polis
        'tgl_spaj',
        'tgl_efektif_polis',
        'tgl_joint',

        // Informasi klaim
        'tgl_meninggal',
        'tgl_dirawat_dr',
        'tgl_dirawat_smp',

        // Referensi
        'asuransi_id',
        'jenisclaim_id',
        'investigator_id',
        'matauang',

        // Informasi tambahan
        'tempat_meninggal',
        'diagnosa_utama',
        'rumah_sakit',
        'area_investigasi',
        'alamat_tertanggung',
        'pekerjaan',
        'informasi_lain',
        'pengaju_klaim',
        'kronologi_singkat',
        'metode_investigasi',
        'agen_terlibat',
        'plan',

        // Dikontrol backend
        'user_id',
        'status',
        'status_sent_client',
        'user_id_approve',
    ];

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