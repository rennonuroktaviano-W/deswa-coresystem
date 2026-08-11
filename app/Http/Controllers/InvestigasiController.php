<?php

namespace App\Http\Controllers;

use App\Models\Investigasi;
use Illuminate\Http\Request;

class InvestigasiController extends Controller
{
    /**
     * Menampilkan semua data Pra Registrasi beserta relationship.
     */
    public function index()
    {
        $investigasis = Investigasi::with([
            'asuransi',
            'jenisClaim',
            'investigator',
        ])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $investigasis,
        ]);
    }

    /**
     * Menyimpan data Pra Registrasi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        // Business logic awal:
        // data baru selalu dimulai sebagai Draft dan belum dikirim ke client.
        $validated['status'] = 0;
        $validated['status_sent_client'] = 0;
        $validated['user_id'] = auth()->id();

        $investigasi = Investigasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data Pra Registrasi berhasil dibuat sebagai Draft.',
            'data' => $investigasi->load([
                'asuransi',
                'jenisClaim',
                'investigator',
            ]),
        ], 201);
    }

    /**
     * Menampilkan detail satu data Pra Registrasi.
     */
    public function show(Investigasi $investigasi)
    {
        $investigasi->load([
            'asuransi',
            'jenisClaim',
            'investigator',
        ]);

        return response()->json([
            'success' => true,
            'data' => $investigasi,
        ]);
    }

    /**
     * Memperbarui data Pra Registrasi.
     *
     * Hanya Draft yang boleh diedit.
     */
    public function update(Request $request, Investigasi $investigasi)
    {
        if ((int) $investigasi->status !== 0) {
            return response()->json([
                'success' => false,
                'message' => 'Data hanya dapat diedit ketika masih berstatus Draft.',
            ], 422);
        }

        $validated = $request->validate($this->rules());

        // Status workflow tidak boleh diubah lewat endpoint update biasa.
        unset(
            $validated['status'],
            $validated['status_sent_client'],
            $validated['user_id_approve']
        );

        $investigasi->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data Pra Registrasi berhasil diperbarui.',
            'data' => $investigasi->fresh()->load([
                'asuransi',
                'jenisClaim',
                'investigator',
            ]),
        ]);
    }

    /**
     * Menghapus data Pra Registrasi.
     *
     * Hanya Draft yang boleh dihapus.
     */
    public function destroy(Investigasi $investigasi)
    {
        if ((int) $investigasi->status !== 0) {
            return response()->json([
                'success' => false,
                'message' => 'Data yang sudah diajukan tidak dapat dihapus.',
            ], 422);
        }

        $investigasi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Pra Registrasi berhasil dihapus.',
        ]);
    }

    /**
     * Mengajukan Draft.
     *
     * Draft (0) -> Diajukan (1)
     */
    public function submit(Investigasi $investigasi)
    {
        if ((int) $investigasi->status !== 0) {
            return response()->json([
                'success' => false,
                'message' => 'Hanya data Draft yang dapat diajukan.',
            ], 422);
        }

        $investigasi->update([
            'status' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diajukan.',
            'data' => $investigasi->fresh(),
        ]);
    }

    /**
     * Menyetujui data yang sudah diajukan.
     *
     * Diajukan (1) -> Disetujui (2)
     */
    public function approve(Investigasi $investigasi)
    {
        if ((int) $investigasi->status !== 1) {
            return response()->json([
                'success' => false,
                'message' => 'Data hanya dapat disetujui setelah diajukan.',
            ], 422);
        }

        $investigasi->update([
            'status' => 2,
            'user_id_approve' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disetujui.',
            'data' => $investigasi->fresh(),
        ]);
    }

    /**
     * Menandai data sudah dikirim ke client.
     */
    public function sendClient(Investigasi $investigasi)
    {
        if ((int) $investigasi->status !== 2) {
            return response()->json([
                'success' => false,
                'message' => 'Data harus disetujui sebelum dikirim ke client.',
            ], 422);
        }

        if ((int) $investigasi->status_sent_client === 1) {
            return response()->json([
                'success' => false,
                'message' => 'Data sudah pernah dikirim ke client.',
            ], 422);
        }

        $investigasi->update([
            'status_sent_client' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditandai sebagai sudah dikirim ke client.',
            'data' => $investigasi->fresh(),
        ]);
    }

    /**
     * Menyelesaikan proses.
     *
     * Disetujui + sudah dikirim -> Selesai (3)
     */
    public function complete(Investigasi $investigasi)
    {
        if ((int) $investigasi->status !== 2) {
            return response()->json([
                'success' => false,
                'message' => 'Data belum berada pada tahap persetujuan.',
            ], 422);
        }

        if ((int) $investigasi->status_sent_client !== 1) {
            return response()->json([
                'success' => false,
                'message' => 'Data harus dikirim ke client terlebih dahulu.',
            ], 422);
        }

        $investigasi->update([
            'status' => 3,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Proses Pra Registrasi telah selesai.',
            'data' => $investigasi->fresh(),
        ]);
    }

    /**
     * Validation rules untuk store dan update.
     */
    private function rules(): array
    {
        return [
            // Identitas case
            'no_case' => 'nullable|string|max:255',
            'number_case' => 'nullable|integer',
            'tgl_registrasi' => 'nullable|date',

            // Polis
            'no_polis' => 'nullable|string|max:255',
            'nm_tertanggung' => 'nullable|string|max:255',
            'nm_pemegang_polis' => 'nullable|string|max:255',
            'nm_agen' => 'nullable|string|max:255',

            // Nilai
            'uang_pertanggungan' => 'nullable|numeric',
            'premi' => 'nullable|numeric',
            'total_premi' => 'nullable|numeric',
            'jml_klaim' => 'nullable|numeric',

            // Tanggal polis
            'tgl_spaj' => 'nullable|date',
            'tgl_efektif_polis' => 'nullable|date',
            'tgl_joint' => 'nullable|date',

            // Informasi meninggal / klaim
            'tgl_meninggal' => 'nullable|date',
            'tgl_dirawat_dr' => 'nullable|date',
            'tgl_dirawat_smp' => 'nullable|date',

            // Referensi
            'asuransi_id' => 'nullable|integer|exists:asuransis,id',
            'jenisclaim_id' => 'nullable|integer|exists:jenis_claims,id',
            'investigator_id' => 'nullable|integer|exists:investigators,id',
            'matauang' => 'nullable|string|max:255',

            // Informasi tambahan
            'tempat_meninggal' => 'nullable|string|max:255',
            'diagnosa_utama' => 'nullable|string|max:255',
            'rumah_sakit' => 'nullable|string|max:255',
            'area_investigasi' => 'nullable|string|max:255',
            'alamat_tertanggung' => 'nullable|string',
            'pekerjaan' => 'nullable|string|max:255',
            'informasi_lain' => 'nullable|string',
            'pengaju_klaim' => 'nullable|string|max:255',
            'kronologi_singkat' => 'nullable|string',
            'metode_investigasi' => 'nullable|string|max:255',
            'agen_terlibat' => 'nullable|string|max:255',
            'plan' => 'nullable|string|max:255',
        ];
    }
}