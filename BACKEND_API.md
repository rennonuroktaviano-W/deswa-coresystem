# BACKEND API CONTRACT

## Deswa CoreSystem - Pra Registrasi

Dokumentasi ini menjelaskan endpoint backend yang dapat digunakan oleh frontend.

---

## 1. Authentication

### Login

**Method**

```http
POST /login
```

**Payload**

```json
{
    "email": "admin@test.com",
    "password": "password123"
}
```

**Hasil**

Jika login berhasil, user diarahkan ke:

```text
/dashboard
```

Jika login gagal, user kembali ke halaman login dan mendapatkan pesan error.

---

### Logout

**Method**

```http
POST /logout
```

**Hasil**

Session user dihapus lalu user diarahkan kembali ke halaman login.

---

## 2. Dashboard

### Dashboard

**Method**

```http
GET /dashboard
```

Route ini hanya dapat diakses oleh user yang sudah login.

---

## 3. SSO Application Routes

### RAISE

```http
GET /raise
```

### BO

```http
GET /bo
```

### SF

```http
GET /sf
```

### Pra Registrasi

```http
GET /pra-registrasi
```

Semua route di atas dilindungi oleh middleware `auth`.

---

## 4. Pra Registrasi CRUD

### Get Semua Data

```http
GET /pra-registrasi
```

**Response**

```json
{
    "success": true,
    "data": []
}
```

### Get Detail

```http
GET /pra-registrasi/{id}
```

Contoh:

```http
GET /pra-registrasi/2
```

### Create

```http
POST /pra-registrasi
```

Contoh payload:

```json
{
    "no_case": "CASE-001",
    "number_case": 1,
    "tgl_registrasi": "2026-08-11",
    "no_polis": "POLIS-001",
    "nm_tertanggung": "Budi Santoso",
    "nm_pemegang_polis": "Budi Santoso",
    "nm_agen": "Agen A",
    "matauang": "IDR"
}
```

Backend otomatis mengisi:

```text
status = 0
status_sent_client = 0
user_id = ID user yang sedang login
```

### Update

```http
PUT /pra-registrasi/{id}
```

Hanya data dengan `status = 0` yang dapat diedit.

### Delete

```http
DELETE /pra-registrasi/{id}
```

Hanya data Draft yang dapat dihapus.

---

## 5. Workflow Pra Registrasi

Mapping status:

```text
0 = Draft
1 = Diajukan
2 = Disetujui
3 = Selesai
```

Mapping pengiriman ke client:

```text
status_sent_client = 0 → Belum dikirim
status_sent_client = 1 → Sudah dikirim
```

### Submit

```http
POST /pra-registrasi/{id}/submit
```

Perubahan:

```text
Draft (0)
↓
Diajukan (1)
```

### Approve

```http
POST /pra-registrasi/{id}/approve
```

Perubahan:

```text
Diajukan (1)
↓
Disetujui (2)
```

Backend juga mengisi:

```text
user_id_approve = ID admin yang sedang login
```

### Send Client

```http
POST /pra-registrasi/{id}/send-client
```

Syarat:

```text
status = 2
```

Backend mengubah:

```text
status_sent_client = 1
```

### Complete

```http
POST /pra-registrasi/{id}/complete
```

Syarat:

```text
status = 2
status_sent_client = 1
```

Hasil:

```text
status = 3
```

---

## 6. Reference Data

```http
GET /references
```

**Response**

```json
{
    "success": true,
    "data": {
        "asuransis": [],
        "jenis_claims": [],
        "investigators": [],
        "matauangs": []
    }
}
```

Digunakan untuk:

```text
Dropdown Asuransi
Dropdown Jenis Klaim
Dropdown Investigator
Dropdown Mata Uang
```

---

## 7. Validation

```text
no_case → string
number_case → integer
tgl_registrasi → date
no_polis → string
nm_tertanggung → string
premi → numeric
total_premi → numeric
jml_klaim → numeric
asuransi_id → harus ada di tabel asuransis
jenisclaim_id → harus ada di tabel jenis_claims
investigator_id → harus ada di tabel investigators
matauang → string
```

Contoh error:

```json
{
    "message": "The number case field must be an integer."
}
```

---

## 8. Authentication Requirement

Endpoint berikut membutuhkan login:

```text
/dashboard
/raise
/bo
/sf
/pra-registrasi
/references
```

---

## 9. Role dan Permission

Role yang saat ini digunakan:

```text
admin
```

Middleware:

```text
auth
admin
```

Route admin:

```text
POST /pra-registrasi/{id}/approve
POST /pra-registrasi/{id}/send-client
POST /pra-registrasi/{id}/complete
```

---

## 10. Frontend Status Badge

```text
0 → Draft
1 → Diajukan
2 → Disetujui
3 → Selesai
```

Saran tombol:

```text
Draft
→ Edit
→ Delete
→ Submit

Diajukan
→ Approve

Disetujui
→ Send Client

Sudah dikirim
→ Complete

Selesai
→ View Detail
```

---

## 11. Flow Sistem

```text
LOGIN
  ↓
DASHBOARD SSO
  ↓
PILIH APLIKASI
  ├── RAISE
  ├── BO
  ├── SF
  └── PRA REGISTRASI
          ↓
        CREATE
          ↓
        DRAFT
          ↓
        SUBMIT
          ↓
       DIAJUKAN
          ↓
        APPROVE
          ↓
      DISETUJUI
          ↓
      SEND CLIENT
          ↓
       COMPLETE
          ↓
        SELESAI
```

---

## 12. Daftar Endpoint

```text
POST   /login
POST   /logout

GET    /dashboard
GET    /raise
GET    /bo
GET    /sf

GET    /pra-registrasi
POST   /pra-registrasi
GET    /pra-registrasi/{id}
PUT    /pra-registrasi/{id}
DELETE /pra-registrasi/{id}

POST   /pra-registrasi/{id}/submit
POST   /pra-registrasi/{id}/approve
POST   /pra-registrasi/{id}/send-client
POST   /pra-registrasi/{id}/complete

GET    /references
```

---

## 13. Catatan Frontend Integration

Frontend tidak perlu mengakses database secara langsung.

```text
Frontend
   ↓
Route Laravel
   ↓
Controller
   ↓
Model
   ↓
MySQL
   ↓
JSON Response
   ↓
Frontend
```

Frontend cukup menggunakan endpoint yang tersedia di dokumen ini.

---

## 14. Catatan Project

```text
Framework : Laravel
Database  : deswa-coresystem
```

Fokus modul Pra Registrasi:

```text
Create
Read
Update
Delete
Authentication
Dashboard SSO
Workflow Pra Registrasi
Reference Data
```
