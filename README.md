# EcoTrack 🌱

**Lihat. Laporkan. Bersihkan.**

EcoTrack adalah platform web interaktif yang dirancang untuk menjembatani masyarakat dengan tim kebersihan atau relawan dalam menangani masalah sampah liar dan pencemaran lingkungan di area publik.

Tujuan utama kami adalah memberdayakan pengguna untuk berpartisipasi aktif dalam menjaga kebersihan lingkungan melalui proses pelaporan yang cepat, transparan, dan terukur. Platform ini mempromosikan aksi cepat dan akuntabilitas dalam pemulihan kondisi lingkungan.

## 👥 Tim Pengembang

| Nama | NIM | Peran |
| :--- | :--- | :--- |
| **I Gede Pasek Surya Dharma Kesuma** | 2405551086 | Developer |
| **Pande Putu Satya Naraya Adyana** | 2405551087 | Developer |
| **Marcell Christian Santoso** | 2405551153 | Developer |

---

## 🚀 Fitur Unggulan

Berikut adalah fitur utama yang tersedia dalam aplikasi EcoTrack:

### 1. Autentikasi & Keamanan Akses (User vs Admin)
Sistem login yang aman menggunakan **Laravel Auth**.
- **Role-Based Access:** Membedakan akses antara masyarakat (pelapor) dan Admin/Pegawai (eksekutor).
- **Middleware Security:** Membatasi akses rute sensitif (seperti Dashboard Admin) agar tidak dapat diakses oleh publik.

### 2. Antarmuka Pengguna & Navigasi (Frontend Experience)
Desain antarmuka yang modern dan nyaman digunakan.
- **Smooth Scroll:** Navigasi antar bagian halaman yang halus.
- **Dynamic Hero Section:** Tampilan awal yang interaktif dengan manipulasi JavaScript.
- **Real-time Stats:** Menampilkan transparansi data (jumlah area dibersihkan) langsung dari database.

### 3. Peta Interaktif & Sistem Pelaporan (Core Feature)
Fitur inti berbasis **Leaflet.js** untuk akurasi lokasi.
- **Visualisasi Lokasi:** Pengguna dapat melihat persebaran titik sampah di peta digital.
- **Pelaporan Mudah:** Formulir pelaporan berbasis Modal Pop-up tanpa reload halaman.
- **Upload Bukti:** Mendukung unggah foto lokasi kejadian.

### 4. Manajemen Operasional Sampah
Dashboard khusus admin untuk mengelola laporan masuk.
- **Monitoring Laporan:** Admin dapat melihat seluruh laporan dalam bentuk tabel/kartu.
- **Update Status:** Mengubah status laporan dari *Pending* -> *In Progress* -> *Completed*.
- **Validasi Data:** Fitur hapus untuk laporan yang tidak valid atau spam.

### 5. Bukti Kerja & Galeri
Menampilkan hasil nyata dari partisipasi masyarakat.
- **Galeri Area Bersih:** Secara otomatis menampilkan foto-foto lokasi yang statusnya telah "Completed" sebagai bentuk transparansi dan motivasi.

---

## 🛠️ Teknologi yang Digunakan

* **Backend Framework:** Laravel (PHP)
* **Database:** MySQL
* **Frontend:** Blade Templates, HTML5, CSS3, JavaScript
* **Maps Library:** Leaflet.js
* **Authentication:** Laravel Auth / Breeze

---

## 💻 Cara Instalasi (Local Development)

Ikuti langkah berikut untuk menjalankan proyek ini di komputer lokal Anda:

1.  **Clone Repositori**
    ```bash
    git clone [https://github.com/username-anda/ecotrack.git](https://github.com/username-anda/ecotrack.git)
    cd ecotrack
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Setup Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Migrasi Database**
    Pastikan database MySQL sudah dibuat, lalu jalankan:
    ```bash
    php artisan migrate
    ```

5.  **Jalankan Server**
    ```bash
    npm run dev
    php artisan serve
    ```

Akses aplikasi melalui `http://localhost:8000`.

---

<p align="center">
  Dibuat dengan ❤️ untuk lingkungan yang lebih baik.
</p>
