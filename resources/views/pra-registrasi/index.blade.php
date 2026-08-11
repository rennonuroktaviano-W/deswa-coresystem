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
        font-family: Arial, sans-serif;
        background: #f5f6f8;
        color: #222;
    }

    .container {
        max-width: 1400px;
        margin: auto;
    }

    .header {
        margin-bottom: 30px;
    }

    .header h1 {
        margin: 0 0 8px;
    }

    .header p {
        margin: 0;
        color: #666;
    }

    .card {
        background: white;
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
        background: #eee;
        font-size: 12px;
        font-weight: bold;
    }

    .back {
        display: inline-block;
        margin-bottom: 20px;
        color: #333;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        body {
            padding: 20px;
        }
    }
    </style>
</head>

<body>

    <div class="container">

        <a href="{{ route('dashboard') }}" class="back">
            ← Kembali ke Dashboard
        </a>

        <div class="header">
            <h1>Pra Registrasi</h1>
            <p>Data investigasi Deswa CoreSystem</p>
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
                    </tr>
                </thead>

                <tbody id="table-body"></tbody>

            </table>

        </div>

    </div>


    <script>
    const DATA_URL = "{{ route('pra-registrasi.data') }}";

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


    async function loadData() {

        const loading = document.getElementById('loading');
        const error = document.getElementById('error');
        const table = document.getElementById('table');
        const tbody = document.getElementById('table-body');

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

            const result = await response.json();

            tbody.innerHTML = '';

            if (!result.data || result.data.length === 0) {

                tbody.innerHTML = `
                <tr>
                    <td colspan="8" style="text-align:center;padding:30px;">
                        Belum ada data Pra Registrasi.
                    </td>
                </tr>
            `;

            } else {

                result.data.forEach(item => {

                    const row = document.createElement('tr');

                    row.innerHTML = `
                    <td>${item.id ?? '-'}</td>

                    <td>
                        ${item.no_case ?? '-'}
                    </td>

                    <td>
                        ${item.number_case ?? '-'}
                    </td>

                    <td>
                        ${item.tgl_registrasi ?? '-'}
                    </td>

                    <td>
                        ${item.no_polis ?? '-'}
                    </td>

                    <td>
                        ${item.nm_tertanggung ?? '-'}
                    </td>

                    <td>
                        <span class="badge">
                            ${statusLabel(item.status)}
                        </span>
                    </td>

                    <td>
                        ${
                            Number(item.status_sent_client) === 1
                                ? 'Sudah dikirim'
                                : 'Belum dikirim'
                        }
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
                'Gagal mengambil data dari backend: ' + err.message;
        }
    }


    document.addEventListener(
        'DOMContentLoaded',
        loadData
    );
    </script>

</body>

</html>