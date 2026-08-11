# HANDOVER PROJECT

## Deswa CoreSystem - Pra Registrasi

Dokumen ini digunakan sebagai panduan handover project untuk tim developer/frontend.

---

## 1. Ringkasan Project

Deswa CoreSystem memiliki alur utama:

```text
Login
↓
Dashboard SSO
↓
Pilih Aplikasi
↓
Pra Registrasi
↓
CRUD + Workflow
```

Aplikasi SSO yang tersedia pada routing:

```text
RAISE
BO
SF
Pra Registrasi
```

Fokus backend yang sudah selesai adalah modul **Pra Registrasi**.

---

## 2. Status Fitur

```text
Authentication            SELESAI
Dashboard SSO             SELESAI
Pra Registrasi List       SELESAI
Create                    SELESAI
Read / Detail             SELESAI
Update                    SELESAI
Delete                    SELESAI
Reference Data            SELESAI
Workflow                  SELESAI
Route Protection          SELESAI
Mass Assignment Security  SELESAI
Frontend Integration      SELESAI
```

---

## 3. Workflow Pra Registrasi

Status utama:

```text
0 = Draft
1 = Diajukan
2 = Disetujui
3 = Selesai
```

Status pengiriman client:

```text
0 = Belum dikirim
1 = Sudah dikirim
```

Flow:

```text
Draft
↓
Ajukan
↓
Diajukan
↓
Approve
↓
Disetujui
↓
Kirim Client
↓
Sudah dikirim
↓
Selesaikan
↓
Selesai
```

---

## 4. Route Utama

Authentication:

```text
GET  /login
POST /login
POST /logout
```

Dashboard:

```text
GET /dashboard
```

SSO:

```text
GET /raise
GET /bo
GET /sf
```

Pra Registrasi:

```text
GET    /pra-registrasi
GET    /pra-registrasi/data
POST   /pra-registrasi
GET    /pra-registrasi/{investigasi}
PUT    /pra-registrasi/{investigasi}
DELETE /pra-registrasi/{investigasi}
```

Workflow:

```text
POST /pra-registrasi/{investigasi}/submit
POST /pra-registrasi/{investigasi}/approve
POST /pra-registrasi/{investigasi}/send-client
POST /pra-registrasi/{investigasi}/complete
```

Reference:

```text
GET /references
```

---

## 5. Middleware

Route utama aplikasi menggunakan:

```text
auth
```

Workflow admin menggunakan:

```text
admin
```

Route berikut hanya untuk admin:

```text
POST /pra-registrasi/{investigasi}/approve
POST /pra-registrasi/{investigasi}/send-client
POST /pra-registrasi/{investigasi}/complete
```

---

## 6. Database

Nama database:

```text
deswa-coresystem
```

Tabel utama Pra Registrasi:

```text
investigasis
```

Reference table:

```text
asuransis
jenis_claims
investigators
matauangs
```

Data utama Pra Registrasi disimpan pada tabel `investigasis`.

Contoh field penting:

```text
id
no_case
number_case
tgl_registrasi
asuransi_id
no_polis
nm_tertanggung
nm_pemegang_polis
nm_agen
jenisclaim_id
investigator_id
matauang
status
status_sent_client
user_id
user_id_approve
created_at
updated_at
```

---

## 7. Reference Data

Endpoint:

```text
GET /references
```

Menghasilkan:

```text
asuransis
jenis_claims
investigators
matauangs
```

Frontend menggunakan endpoint ini untuk dropdown:

```text
Asuransi
Jenis Klaim
Investigator
Mata Uang
```

---

## 8. Validation

Validation backend berada di:

```text
app/Http/Controllers/InvestigasiController.php
```

Contoh validation:

```text
number_case       integer
tgl_registrasi    date
premi             numeric
total_premi       numeric
jml_klaim         numeric
asuransi_id       exists:asuransis,id
jenisclaim_id     exists:jenis_claims,id
investigator_id   exists:investigators,id
```

Frontend tidak boleh menjadi satu-satunya validation.
Validation Laravel harus tetap dipertahankan.

---

## 9. Security

### Authentication

Halaman protected tidak dapat dibuka setelah user logout.

Contoh:

```text
/pra-registrasi
```

Jika user belum login, aplikasi mengarahkan user ke:

```text
/login
```

### CSRF

Request POST / PUT / DELETE dari Blade menggunakan CSRF token.

### Mass Assignment

Model `Investigasi` menggunakan:

```php
protected $fillable = [...];
```

Jangan mengubah kembali menjadi:

```php
protected $guarded = [];
```

tanpa alasan yang jelas.

---

## 10. Struktur File Penting

```text
app/
├── Http/
│   └── Controllers/
│       ├── AuthController.php
│       ├── DashboardController.php
│       ├── InvestigasiController.php
│       └── ReferenceController.php
│
└── Models/
    ├── Investigasi.php
    ├── Asuransi.php
    ├── JenisClaim.php
    └── Investigator.php

resources/
└── views/
    ├── dashboard/
    │   └── index.blade.php
    │
    └── pra-registrasi/
        └── index.blade.php

routes/
└── web.php

BACKEND_API.md
HANDOVER.md
```

---

## 11. Menjalankan Project

Masuk ke folder project:

```bash
cd deswa-coresystem
```

Install dependency jika diperlukan:

```bash
composer install
```

Copy environment:

```bash
copy .env.example .env
```

Generate app key jika `.env` baru:

```bash
php artisan key:generate
```

Pastikan konfigurasi database pada `.env` sesuai environment lokal.

Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=deswa-coresystem
DB_USERNAME=root
DB_PASSWORD=
```

Clear cache:

```bash
php artisan optimize:clear
```

Jalankan aplikasi:

```bash
php artisan serve
```

---

## 12. Catatan Migration Penting

Hasil terakhir:

```text
2014_10_12_000000_create_users_table                  Pending
2014_10_12_100000_create_password_reset_tokens_table  Pending
2019_08_19_000000_create_failed_jobs_table            Pending
2019_12_14_000001_create_personal_access_tokens_table Pending
```

Database project saat ini sudah memiliki data/tabel yang digunakan aplikasi.

### PERHATIAN

Jangan langsung menjalankan:

```bash
php artisan migrate
```

pada database existing sebelum memastikan migration tersebut tidak bentrok dengan tabel yang sudah ada.

Developer berikutnya harus memeriksa struktur database existing terlebih dahulu.

---

## 13. Git

File `.env` tidak di-track oleh Git.

Pastikan kondisi ini tetap dipertahankan.

Sebelum mulai pekerjaan:

```bash
git pull --rebase origin main
```

Setelah pekerjaan selesai:

```bash
git status
git add .
git commit -m "pesan commit"
git pull --rebase origin main
git push origin main
```

Hindari penggunaan:

```bash
git push --force
```

atau:

```bash
git reset --hard
```

tanpa memahami dampaknya.

---

## 14. Testing Checklist

Sebelum handover final, pastikan:

```text
[ ] Login berhasil
[ ] Dashboard dapat dibuka
[ ] Logout kembali ke login
[ ] Pra Registrasi terlindungi auth
[ ] List data tampil
[ ] Create berhasil
[ ] Detail berhasil
[ ] Edit Draft berhasil
[ ] Delete Draft berhasil
[ ] Ajukan berhasil
[ ] Approve berhasil
[ ] Kirim Client berhasil
[ ] Complete berhasil
[ ] Reference dropdown tampil
[ ] Data tersimpan ke tabel investigasis
```

---

## 15. Catatan Frontend

UI / desain frontend dapat dikembangkan terpisah selama tetap menggunakan route dan kontrak backend yang tersedia.

Jangan mengubah business logic backend hanya untuk kebutuhan styling.

Dokumentasi endpoint tersedia pada:

```text
BACKEND_API.md
```

---

## 16. Status Handover

Backend utama Pra Registrasi:

```text
READY FOR HANDOVER
```

Hal yang perlu diperhatikan developer berikutnya:

```text
1. Jangan menjalankan migration secara sembarangan pada database existing.
2. Pertahankan middleware auth dan admin.
3. Pertahankan validation Laravel.
4. Pertahankan CSRF protection.
5. Jangan expose file .env.
6. Gunakan BACKEND_API.md sebagai kontrak integrasi frontend.
```
