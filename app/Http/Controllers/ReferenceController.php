<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use App\Models\JenisClaim;
use App\Models\Investigator;
use Illuminate\Support\Facades\DB;

class ReferenceController extends Controller
{
    public function index()
    {
        $asuransis = Asuransi::select(
            'id',
            'kd_perusahaan',
            'nm_perusahaan'
        )->orderBy('nm_perusahaan')->get();

        $jenisClaims = JenisClaim::select(
            'id',
            'jenis_klaim',
            'keterangan'
        )->orderBy('jenis_klaim')->get();

        $investigators = Investigator::select(
            'id',
            'nm_investigator',
            'telp'
        )->orderBy('nm_investigator')->get();

        $matauangs = DB::table('matauangs')
            ->select(
                'id',
                'matauang'
            )
            ->orderBy('matauang')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'asuransis' => $asuransis,
                'jenis_claims' => $jenisClaims,
                'investigators' => $investigators,
                'matauangs' => $matauangs,
            ],
        ]);
    }
}