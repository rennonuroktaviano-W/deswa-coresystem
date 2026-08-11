<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pra Registrasi - Deswa CoreSystem</title>

    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 40px;
        font-family: Arial, Helvetica, sans-serif;
        background: #f5f6f8;
        color: #18181b;
    }

    button,
    input,
    textarea,
    select {
        font: inherit;
    }

    .container {
        max-width: 1450px;
        margin: auto;
    }

    .back {
        display: inline-block;
        margin-bottom: 20px;
        color: #27272a;
        text-decoration: none;
    }

    .header-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 30px;
    }

    .header h1 {
        margin: 0 0 8px;
        font-size: 36px;
    }

    .header p {
        margin: 0;
        color: #71717a;
    }

    .btn {
        border: 0;
        border-radius: 8px;
        padding: 11px 18px;
        cursor: pointer;
        font-weight: 600;
    }

    .btn-primary {
        background: #18181b;
        color: #fff;
    }

    .btn-primary:hover {
        background: #27272a;
    }

    .btn-secondary {
        background: #e4e4e7;
        color: #18181b;
    }

    .card {
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, .06);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 14px;
        border-bottom: 1px solid #eee;
        text-align: left;
        white-space: nowrap;
    }

    th {
        background: #f8f8f8;
    }

    .loading {
        padding: 30px;
        text-align: center;
    }

    .error {
        color: #b91c1c;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 20px;
        background: #eeeeef;
        font-size: 12px;
        font-weight: bold;
    }

    /* =========================
           MODAL
        ========================= */

    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .55);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        z-index: 999;
    }

    .modal-overlay.active {
        display: flex;
    }

    .modal {
        background: white;
        width: 100%;
        max-width: 850px;
        max-height: 90vh;
        overflow-y: auto;
        border-radius: 14px;
        padding: 28px;
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .modal-header h2 {
        margin: 0;
    }

    .close-button {
        border: none;
        background: transparent;
        font-size: 25px;
        cursor: pointer;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        font-size: 13px;
        font-weight: 700;
    }

    .form-control {
        width: 100%;
        border: 1px solid #d4d4d8;
        border-radius: 8px;
        padding: 11px 12px;
        outline: none;
        background: white;
    }

    .form-control:focus {
        border-color: #52525b;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .form-errors {
        display: none;
        background: #fee2e2;
        color: #991b1b;
        border-radius: 8px;
        padding: 12px 15px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .form-errors.active {
        display: block;
    }

    .form-success {
        display: none;
        background: #dcfce7;
        color: #166534;
        border-radius: 8px;
        padding: 12px 15px;
        margin-bottom: 20px;
    }

    .form-success.active {
        display: block;
    }

    .modal-footer {
        margin-top: 25px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .actions {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .btn-sm {
        padding: 7px 10px;
        border: 0;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 700;
    }

    .btn-detail {
        background: #e4e4e7;
        color: #18181b;
    }

    .btn-edit {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .btn-delete {
        background: #fee2e2;
        color: #b91c1c;
    }

    .btn-submit {
        background: #18181b;
        color: #fff;
    }

    .btn-approve {
        background: #dcfce7;
        color: #166534;
    }

    .btn-send {
        background: #fef3c7;
        color: #92400e;
    }

    .btn-complete {
        background: #ede9fe;
        color: #6d28d9;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    .detail-item {
        background: #f8f8f8;
        padding: 12px;
        border-radius: 8px;
    }

    .detail-item strong {
        display: block;
        font-size: 12px;
        color: #71717a;
        margin-bottom: 4px;
    }

    .detail-item.full {
        grid-column: 1 / -1;
    }

    @media (max-width: 768px) {

        body {
            padding: 20px;
        }

        .header-row {
            align-items: flex-start;
            flex-direction: column;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }
    }
    </style>
</head>

<body>

    <div class="container">

        <a href="{{ route('dashboard') }}" class="back">
            ← Kembali ke Dashboard
        </a>

        <div class="header-row">

            <div class="header">
                <h1>Pra Registrasi</h1>
                <p>Data investigasi Deswa CoreSystem</p>
            </div>

            <button type="button" class="btn btn-primary" id="openCreateModal">
                + Tambah Data
            </button>

        </div>

        <div class="card">

            <div id="loading" class="loading">
                Mengambil data...
            </div>

            <div id="error" class="loading error" style="display:none;"></div>

            <table id="table" style="display:none;">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>No Case</th>
                        <th>Number Case</th>
                        <th>Tanggal Registrasi</th>
                        <th>No Polis</th>
                        <th>Tertanggung</th>
                        <th>Status</th>
                        <th>Kirim Client</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="table-body"></tbody>

            </table>

        </div>

    </div>


    <!-- =========================
     CREATE MODAL
========================= -->

    <div class="modal-overlay" id="createModal">

        <div class="modal">

            <div class="modal-header">

                <div>
                    <h2>Tambah Pra Registrasi</h2>
                    <p style="margin:5px 0 0;color:#71717a;">
                        Masukkan data baru.
                    </p>
                </div>

                <button type="button" class="close-button" id="closeCreateModal">
                    ×
                </button>

            </div>


            <div id="formErrors" class="form-errors"></div>

            <div id="formSuccess" class="form-success">
                Data berhasil ditambahkan.
            </div>


            <form id="createForm">

                <div class="form-grid">

                    <div class="form-group">
                        <label>No Case</label>

                        <input type="text" name="no_case" class="form-control" placeholder="Contoh: CASE-001">
                    </div>


                    <div class="form-group">
                        <label>Number Case</label>

                        <input type="number" name="number_case" class="form-control" placeholder="Contoh: 1">
                    </div>


                    <div class="form-group">
                        <label>Tanggal Registrasi</label>

                        <input type="date" name="tgl_registrasi" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>No Polis</label>

                        <input type="text" name="no_polis" class="form-control" placeholder="Nomor polis">
                    </div>


                    <div class="form-group">
                        <label>Nama Tertanggung</label>

                        <input type="text" name="nm_tertanggung" class="form-control" placeholder="Nama tertanggung">
                    </div>


                    <div class="form-group">
                        <label>Nama Pemegang Polis</label>

                        <input type="text" name="nm_pemegang_polis" class="form-control"
                            placeholder="Nama pemegang polis">
                    </div>


                    <div class="form-group">
                        <label>Nama Agen</label>

                        <input type="text" name="nm_agen" class="form-control" placeholder="Nama agen">
                    </div>


                    <div class="form-group">
                        <label>Asuransi</label>
                        <select name="asuransi_id" id="create_asuransi_id" class="form-control">
                            <option value="">Pilih Asuransi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Klaim</label>
                        <select name="jenisclaim_id" id="create_jenisclaim_id" class="form-control">
                            <option value="">Pilih Jenis Klaim</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Investigator</label>
                        <select name="investigator_id" id="create_investigator_id" class="form-control">
                            <option value="">Pilih Investigator</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mata Uang</label>
                        <select name="matauang" id="create_matauang" class="form-control">
                            <option value="">Pilih Mata Uang</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Uang Pertanggungan</label>

                        <input type="number" name="uang_pertanggungan" class="form-control" placeholder="0">
                    </div>


                    <div class="form-group">
                        <label>Premi</label>

                        <input type="number" name="premi" class="form-control" placeholder="0">
                    </div>


                    <div class="form-group">
                        <label>Total Premi</label>

                        <input type="number" name="total_premi" class="form-control" placeholder="0">
                    </div>


                    <div class="form-group">
                        <label>Jumlah Klaim</label>

                        <input type="number" name="jml_klaim" class="form-control" placeholder="0">
                    </div>


                    <div class="form-group">
                        <label>Pekerjaan</label>

                        <input type="text" name="pekerjaan" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>Pengaju Klaim</label>

                        <input type="text" name="pengaju_klaim" class="form-control">
                    </div>


                    <div class="form-group full">
                        <label>Alamat Tertanggung</label>

                        <textarea name="alamat_tertanggung" class="form-control"></textarea>
                    </div>


                    <div class="form-group full">
                        <label>Informasi Lain</label>

                        <textarea name="informasi_lain" class="form-control"></textarea>
                    </div>


                    <div class="form-group full">
                        <label>Kronologi Singkat</label>

                        <textarea name="kronologi_singkat" class="form-control"></textarea>
                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" id="cancelCreate">
                        Batal
                    </button>

                    <button type="submit" class="btn btn-primary" id="submitCreate">
                        Simpan Data
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- DETAIL MODAL -->
    <div class="modal-overlay" id="detailModal">
        <div class="modal">
            <div class="modal-header">
                <div>
                    <h2>Detail Pra Registrasi</h2>
                    <p style="margin:5px 0 0;color:#71717a;">Informasi data terpilih.</p>
                </div>
                <button type="button" class="close-button" id="closeDetailModal">×</button>
            </div>
            <div class="detail-grid" id="detailContent"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeDetailButton">Tutup</button>
            </div>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal-overlay" id="editModal">
        <div class="modal">
            <div class="modal-header">
                <div>
                    <h2>Edit Pra Registrasi</h2>
                    <p style="margin:5px 0 0;color:#71717a;">Hanya data Draft yang dapat diedit.</p>
                </div>
                <button type="button" class="close-button" id="closeEditModal">×</button>
            </div>

            <div id="editErrors" class="form-errors"></div>

            <form id="editForm">
                <input type="hidden" id="editId">
                <div class="form-grid">
                    <div class="form-group"><label>No Case</label><input type="text" name="no_case" id="edit_no_case"
                            class="form-control"></div>
                    <div class="form-group"><label>Number Case</label><input type="number" name="number_case"
                            id="edit_number_case" class="form-control"></div>
                    <div class="form-group"><label>Tanggal Registrasi</label><input type="date" name="tgl_registrasi"
                            id="edit_tgl_registrasi" class="form-control"></div>
                    <div class="form-group"><label>No Polis</label><input type="text" name="no_polis" id="edit_no_polis"
                            class="form-control"></div>
                    <div class="form-group"><label>Nama Tertanggung</label><input type="text" name="nm_tertanggung"
                            id="edit_nm_tertanggung" class="form-control"></div>
                    <div class="form-group"><label>Nama Pemegang Polis</label><input type="text"
                            name="nm_pemegang_polis" id="edit_nm_pemegang_polis" class="form-control"></div>
                    <div class="form-group"><label>Nama Agen</label><input type="text" name="nm_agen" id="edit_nm_agen"
                            class="form-control"></div>
                    <div class="form-group">
                        <label>Asuransi</label>
                        <select name="asuransi_id" id="edit_asuransi_id" class="form-control">
                            <option value="">Pilih Asuransi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Klaim</label>
                        <select name="jenisclaim_id" id="edit_jenisclaim_id" class="form-control">
                            <option value="">Pilih Jenis Klaim</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Investigator</label>
                        <select name="investigator_id" id="edit_investigator_id" class="form-control">
                            <option value="">Pilih Investigator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Uang</label>
                        <select name="matauang" id="edit_matauang" class="form-control">
                            <option value="">Pilih Mata Uang</option>
                        </select>
                    </div>
                    <div class="form-group full"><label>Alamat Tertanggung</label><textarea name="alamat_tertanggung"
                            id="edit_alamat_tertanggung" class="form-control"></textarea></div>
                    <div class="form-group full"><label>Informasi Lain</label><textarea name="informasi_lain"
                            id="edit_informasi_lain" class="form-control"></textarea></div>
                    <div class="form-group full"><label>Kronologi Singkat</label><textarea name="kronologi_singkat"
                            id="edit_kronologi_singkat" class="form-control"></textarea></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelEdit">Batal</button>
                    <button type="submit" class="btn btn-primary" id="submitEdit">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    const DATA_URL = "{{ route('pra-registrasi.data') }}";
    const STORE_URL = "{{ route('pra-registrasi.store') }}";
    const SHOW_URL_TEMPLATE = "{{ route('pra-registrasi.show', ['investigasi' => '__ID__']) }}";
    const UPDATE_URL_TEMPLATE = "{{ route('pra-registrasi.update', ['investigasi' => '__ID__']) }}";
    const DELETE_URL_TEMPLATE = "{{ route('pra-registrasi.destroy', ['investigasi' => '__ID__']) }}";
    const SUBMIT_URL_TEMPLATE = "{{ route('pra-registrasi.submit', ['investigasi' => '__ID__']) }}";
    const APPROVE_URL_TEMPLATE = "{{ route('pra-registrasi.approve', ['investigasi' => '__ID__']) }}";
    const SEND_CLIENT_URL_TEMPLATE = "{{ route('pra-registrasi.send-client', ['investigasi' => '__ID__']) }}";
    const COMPLETE_URL_TEMPLATE = "{{ route('pra-registrasi.complete', ['investigasi' => '__ID__']) }}";
    const REFERENCES_URL = "{{ route('references.index') }}";

    const CSRF_TOKEN = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');


    /* =========================
       REFERENCES
    ========================= */

    let referenceData = {
        asuransis: [],
        jenis_claims: [],
        investigators: [],
        matauangs: []
    };

    async function loadReferences() {
        try {
            const response = await fetch(REFERENCES_URL, {
                headers: {
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (!response.ok || !result.success) {
                throw new Error(result.message ?? 'Gagal mengambil data referensi.');
            }

            referenceData = result.data ?? referenceData;
            fillReferenceSelects();

        } catch (error) {
            console.error('Reference error:', error);
            alert('Data referensi gagal dimuat: ' + error.message);
        }
    }

    function setSelectOptions(id, placeholder, items, valueKey, labelBuilder) {
        const select = document.getElementById(id);
        if (!select) return;

        const currentValue = select.value;

        select.innerHTML =
            `<option value="">${escapeHtml(placeholder)}</option>` +
            items.map(item =>
                `<option value="${escapeHtml(item[valueKey])}">${escapeHtml(labelBuilder(item))}</option>`
            ).join('');

        if (currentValue !== '') {
            select.value = currentValue;
        }
    }

    function fillReferenceSelects() {
        ['create_asuransi_id', 'edit_asuransi_id'].forEach(id => {
            setSelectOptions(
                id,
                'Pilih Asuransi',
                referenceData.asuransis ?? [],
                'id',
                item => item.kd_perusahaan ?
                `${item.kd_perusahaan} - ${item.nm_perusahaan}` :
                item.nm_perusahaan
            );
        });

        ['create_jenisclaim_id', 'edit_jenisclaim_id'].forEach(id => {
            setSelectOptions(
                id,
                'Pilih Jenis Klaim',
                referenceData.jenis_claims ?? [],
                'id',
                item => item.keterangan ?
                `${item.jenis_klaim} - ${item.keterangan}` :
                item.jenis_klaim
            );
        });

        ['create_investigator_id', 'edit_investigator_id'].forEach(id => {
            setSelectOptions(
                id,
                'Pilih Investigator',
                referenceData.investigators ?? [],
                'id',
                item => item.telp ?
                `${item.nm_investigator} - ${item.telp}` :
                item.nm_investigator
            );
        });

        ['create_matauang', 'edit_matauang'].forEach(id => {
            setSelectOptions(
                id,
                'Pilih Mata Uang',
                referenceData.matauangs ?? [],
                'matauang',
                item => item.matauang
            );
        });
    }

    /* =========================
       STATUS
    ========================= */

    function statusLabel(status) {

        switch (Number(status)) {

            case 0:
                return 'Draft';

            case 1:
                return 'Diajukan';

            case 2:
                return 'Disetujui';

            case 3:
                return 'Selesai';

            default:
                return '-';
        }
    }


    /* =========================
       LOAD DATA
    ========================= */

    async function loadData() {

        const loading =
            document.getElementById('loading');

        const error =
            document.getElementById('error');

        const table =
            document.getElementById('table');

        const tbody =
            document.getElementById('table-body');


        loading.style.display = 'block';
        error.style.display = 'none';
        table.style.display = 'none';


        try {

            const response = await fetch(DATA_URL, {

                method: 'GET',

                headers: {
                    'Accept': 'application/json'
                }

            });


            if (!response.ok) {

                throw new Error(
                    'HTTP Error: ' + response.status
                );

            }


            const result =
                await response.json();


            tbody.innerHTML = '';


            if (
                !result.data ||
                result.data.length === 0
            ) {

                tbody.innerHTML = `

                <tr>

                    <td
                        colspan="9"
                        style="
                            text-align:center;
                            padding:30px;
                        "
                    >
                        Belum ada data Pra Registrasi.
                    </td>

                </tr>

            `;

            } else {

                result.data.forEach(item => {

                    const row =
                        document.createElement('tr');


                    row.innerHTML = `

                    <td>
                        ${item.id ?? '-'}
                    </td>

                    <td>
                        ${escapeHtml(item.no_case ?? '-')}
                    </td>

                    <td>
                        ${item.number_case ?? '-'}
                    </td>

                    <td>
                        ${item.tgl_registrasi ?? '-'}
                    </td>

                    <td>
                        ${escapeHtml(item.no_polis ?? '-')}
                    </td>

                    <td>
                        ${escapeHtml(item.nm_tertanggung ?? '-')}
                    </td>

                    <td>

                        <span class="badge">

                            ${statusLabel(item.status)}

                        </span>

                    </td>

                    <td>

                        ${
                            Number(
                                item.status_sent_client
                            ) === 1

                                ? 'Sudah dikirim'

                                : 'Belum dikirim'
                        }

                    </td>

                    <td>
                        <div class="actions">
                            <button class="btn-sm btn-detail" onclick="showDetail(${item.id})">Detail</button>
                            ${
                                Number(item.status) === 0
                                    ? `
                                        <button class="btn-sm btn-edit" onclick="openEdit(${item.id})">Edit</button>
                                        <button class="btn-sm btn-delete" onclick="deleteData(${item.id})">Hapus</button>
                                        <button class="btn-sm btn-submit" onclick="submitData(${item.id})">Ajukan</button>
                                    `
                                    : Number(item.status) === 1
                                        ? `
                                            <button class="btn-sm btn-approve" onclick="approveData(${item.id})">Approve</button>
                                        `
                                        : Number(item.status) === 2 && Number(item.status_sent_client) === 0
                                            ? `
                                                <button class="btn-sm btn-send" onclick="sendClientData(${item.id})">Kirim Client</button>
                                            `
                                            : Number(item.status) === 2 && Number(item.status_sent_client) === 1
                                                ? `
                                                    <button class="btn-sm btn-complete" onclick="completeData(${item.id})">Selesaikan</button>
                                                `
                                                : ''
                            }
                        </div>
                    </td>

                `;


                    tbody.appendChild(row);

                });

            }


            loading.style.display = 'none';

            table.style.display = 'table';


        } catch (err) {

            console.error(err);


            loading.style.display = 'none';

            error.style.display = 'block';


            error.textContent =
                'Gagal mengambil data dari backend: ' +
                err.message;

        }

    }


    /* =========================
       CREATE MODAL
    ========================= */

    const createModal =
        document.getElementById('createModal');

    const createForm =
        document.getElementById('createForm');

    const openCreateModal =
        document.getElementById('openCreateModal');

    const closeCreateModal =
        document.getElementById('closeCreateModal');

    const cancelCreate =
        document.getElementById('cancelCreate');


    function openModal() {

        createModal.classList.add('active');

        document.body.style.overflow = 'hidden';

    }


    function closeModal() {

        createModal.classList.remove('active');

        document.body.style.overflow = '';

    }


    openCreateModal.addEventListener(
        'click',
        openModal
    );


    closeCreateModal.addEventListener(
        'click',
        closeModal
    );


    cancelCreate.addEventListener(
        'click',
        closeModal
    );


    createModal.addEventListener(
        'click',
        function(event) {

            if (event.target === createModal) {

                closeModal();

            }

        }
    );


    /* =========================
       CREATE DATA
    ========================= */

    createForm.addEventListener(
        'submit',
        async function(event) {

            event.preventDefault();


            const submitButton =
                document.getElementById(
                    'submitCreate'
                );

            const formErrors =
                document.getElementById(
                    'formErrors'
                );

            const formSuccess =
                document.getElementById(
                    'formSuccess'
                );


            formErrors.classList.remove('active');

            formSuccess.classList.remove('active');


            const formData =
                new FormData(createForm);


            const payload = {};


            formData.forEach(
                (value, key) => {

                    if (value !== '') {

                        payload[key] = value;

                    }

                }
            );


            submitButton.disabled = true;

            submitButton.textContent =
                'Menyimpan...';


            try {

                const response =
                    await fetch(STORE_URL, {

                        method: 'POST',

                        headers: {

                            'Content-Type': 'application/json',

                            'Accept': 'application/json',

                            'X-CSRF-TOKEN': CSRF_TOKEN

                        },

                        body: JSON.stringify(payload)

                    });


                const result =
                    await response.json();


                if (!response.ok) {

                    if (result.errors) {

                        const messages =
                            Object.values(
                                result.errors
                            )
                            .flat();


                        formErrors.innerHTML =
                            messages
                            .map(
                                message =>
                                `<div>${escapeHtml(message)}</div>`
                            )
                            .join('');


                    } else {

                        formErrors.textContent =
                            result.message ??
                            'Data gagal disimpan.';

                    }


                    formErrors.classList.add(
                        'active'
                    );


                    return;

                }


                formSuccess.textContent =
                    result.message ??
                    'Data berhasil disimpan.';


                formSuccess.classList.add(
                    'active'
                );


                createForm.reset();


                await loadData();


                setTimeout(
                    () => {

                        closeModal();

                        formSuccess
                            .classList
                            .remove('active');

                    },
                    800
                );


            } catch (error) {

                console.error(error);


                formErrors.textContent =
                    'Terjadi kesalahan ketika ' +
                    'menghubungi backend.';


                formErrors.classList.add(
                    'active'
                );


            } finally {

                submitButton.disabled =
                    false;


                submitButton.textContent =
                    'Simpan Data';

            }

        }
    );



    /* =========================
       DETAIL / EDIT / DELETE / SUBMIT
    ========================= */

    function routeWithId(template, id) {
        return template.replace('__ID__', id);
    }

    const detailModal = document.getElementById('detailModal');
    const editModal = document.getElementById('editModal');

    function openOverlay(modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeOverlay(modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    document.getElementById('closeDetailModal').addEventListener('click', () => closeOverlay(detailModal));
    document.getElementById('closeDetailButton').addEventListener('click', () => closeOverlay(detailModal));
    document.getElementById('closeEditModal').addEventListener('click', () => closeOverlay(editModal));
    document.getElementById('cancelEdit').addEventListener('click', () => closeOverlay(editModal));

    detailModal.addEventListener('click', event => {
        if (event.target === detailModal) closeOverlay(detailModal);
    });

    editModal.addEventListener('click', event => {
        if (event.target === editModal) closeOverlay(editModal);
    });

    async function fetchDetail(id) {
        const response = await fetch(routeWithId(SHOW_URL_TEMPLATE, id), {
            headers: {
                'Accept': 'application/json'
            }
        });

        const result = await response.json();

        if (!response.ok) {
            throw new Error(result.message ?? 'Gagal mengambil detail data.');
        }

        return result.data;
    }

    async function showDetail(id) {
        try {
            const item = await fetchDetail(id);
            const content = document.getElementById('detailContent');

            const fields = [
                ['ID', item.id],
                ['No Case', item.no_case],
                ['Number Case', item.number_case],
                ['Tanggal Registrasi', item.tgl_registrasi],
                ['No Polis', item.no_polis],
                ['Nama Tertanggung', item.nm_tertanggung],
                ['Pemegang Polis', item.nm_pemegang_polis],
                ['Nama Agen', item.nm_agen],
                ['Mata Uang', item.matauang],
                ['Status', statusLabel(item.status)],
                ['Kirim Client', Number(item.status_sent_client) === 1 ? 'Sudah dikirim' : 'Belum dikirim'],
                ['Alamat Tertanggung', item.alamat_tertanggung],
                ['Informasi Lain', item.informasi_lain],
                ['Kronologi Singkat', item.kronologi_singkat]
            ];

            content.innerHTML = fields.map(([label, value]) => `
                <div class="detail-item ${['Alamat Tertanggung','Informasi Lain','Kronologi Singkat'].includes(label) ? 'full' : ''}">
                    <strong>${escapeHtml(label)}</strong>
                    <span>${escapeHtml(value ?? '-')}</span>
                </div>
            `).join('');

            openOverlay(detailModal);

        } catch (error) {
            alert(error.message);
        }
    }

    async function openEdit(id) {
        try {
            const item = await fetchDetail(id);

            if (Number(item.status) !== 0) {
                alert('Data hanya dapat diedit ketika masih Draft.');
                return;
            }

            document.getElementById('editId').value = item.id;
            document.getElementById('edit_no_case').value = item.no_case ?? '';
            document.getElementById('edit_number_case').value = item.number_case ?? '';
            document.getElementById('edit_tgl_registrasi').value = item.tgl_registrasi ?? '';
            document.getElementById('edit_no_polis').value = item.no_polis ?? '';
            document.getElementById('edit_nm_tertanggung').value = item.nm_tertanggung ?? '';
            document.getElementById('edit_nm_pemegang_polis').value = item.nm_pemegang_polis ?? '';
            document.getElementById('edit_nm_agen').value = item.nm_agen ?? '';

            // Pastikan option reference sudah tersedia sebelum memilih nilai data lama.
            fillReferenceSelects();
            document.getElementById('edit_asuransi_id').value = item.asuransi_id ?? '';
            document.getElementById('edit_jenisclaim_id').value = item.jenisclaim_id ?? '';
            document.getElementById('edit_investigator_id').value = item.investigator_id ?? '';
            document.getElementById('edit_matauang').value = item.matauang ?? '';

            document.getElementById('edit_alamat_tertanggung').value = item.alamat_tertanggung ?? '';
            document.getElementById('edit_informasi_lain').value = item.informasi_lain ?? '';
            document.getElementById('edit_kronologi_singkat').value = item.kronologi_singkat ?? '';

            document.getElementById('editErrors').classList.remove('active');
            openOverlay(editModal);

        } catch (error) {
            alert(error.message);
        }
    }

    document.getElementById('editForm').addEventListener('submit', async function(event) {
        event.preventDefault();

        const id = document.getElementById('editId').value;
        const button = document.getElementById('submitEdit');
        const errorBox = document.getElementById('editErrors');
        const formData = new FormData(this);
        const payload = {};

        formData.forEach((value, key) => {
            payload[key] = value === '' ? null : value;
        });

        button.disabled = true;
        button.textContent = 'Menyimpan...';
        errorBox.classList.remove('active');

        try {
            const response = await fetch(routeWithId(UPDATE_URL_TEMPLATE, id), {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (!response.ok) {
                if (result.errors) {
                    errorBox.innerHTML = Object.values(result.errors)
                        .flat()
                        .map(message => `<div>${escapeHtml(message)}</div>`)
                        .join('');
                } else {
                    errorBox.textContent = result.message ?? 'Data gagal diperbarui.';
                }

                errorBox.classList.add('active');
                return;
            }

            closeOverlay(editModal);
            await loadData();
            alert(result.message ?? 'Data berhasil diperbarui.');

        } catch (error) {
            errorBox.textContent = 'Terjadi kesalahan ketika menghubungi backend.';
            errorBox.classList.add('active');
        } finally {
            button.disabled = false;
            button.textContent = 'Simpan Perubahan';
        }
    });

    async function deleteData(id) {
        if (!confirm('Yakin ingin menghapus data ini?')) return;

        try {
            const response = await fetch(routeWithId(DELETE_URL_TEMPLATE, id), {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                }
            });

            const result = await response.json();

            if (!response.ok) {
                alert(result.message ?? 'Data gagal dihapus.');
                return;
            }

            await loadData();
            alert(result.message ?? 'Data berhasil dihapus.');

        } catch (error) {
            alert('Terjadi kesalahan ketika menghubungi backend.');
        }
    }

    async function submitData(id) {
        if (!confirm('Ajukan data ini? Setelah diajukan, data tidak bisa diedit atau dihapus.')) return;

        try {
            const response = await fetch(routeWithId(SUBMIT_URL_TEMPLATE, id), {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                }
            });

            const result = await response.json();

            if (!response.ok) {
                alert(result.message ?? 'Data gagal diajukan.');
                return;
            }

            await loadData();
            alert(result.message ?? 'Data berhasil diajukan.');

        } catch (error) {
            alert('Terjadi kesalahan ketika menghubungi backend.');
        }
    }


    async function runWorkflowAction(url, confirmationMessage, fallbackMessage) {
        if (!confirm(confirmationMessage)) return;

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                }
            });

            let result = {};
            try {
                result = await response.json();
            } catch (_) {
                result = {};
            }

            if (!response.ok) {
                alert(result.message ?? `Request gagal (HTTP ${response.status}).`);
                return;
            }

            await loadData();
            alert(result.message ?? fallbackMessage);

        } catch (error) {
            console.error(error);
            alert('Terjadi kesalahan ketika menghubungi backend.');
        }
    }

    async function approveData(id) {
        await runWorkflowAction(
            routeWithId(APPROVE_URL_TEMPLATE, id),
            'Approve data Pra Registrasi ini?',
            'Data berhasil disetujui.'
        );
    }

    async function sendClientData(id) {
        await runWorkflowAction(
            routeWithId(SEND_CLIENT_URL_TEMPLATE, id),
            'Kirim data ini ke client?',
            'Data berhasil dikirim ke client.'
        );
    }

    async function completeData(id) {
        await runWorkflowAction(
            routeWithId(COMPLETE_URL_TEMPLATE, id),
            'Tandai investigasi ini sebagai selesai?',
            'Data berhasil diselesaikan.'
        );
    }

    /* =========================
       ESCAPE HTML
    ========================= */

    function escapeHtml(value) {

        const div =
            document.createElement('div');


        div.textContent =
            String(value);


        return div.innerHTML;

    }


    /* =========================
       INITIAL LOAD
    ========================= */

    document.addEventListener('DOMContentLoaded', async () => {
        await Promise.all([
            loadReferences(),
            loadData()
        ]);
    });
    </script>

</body>

</html>