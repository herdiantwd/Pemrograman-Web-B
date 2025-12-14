# Laporan Dokumentasi Proyek Cinerate

### A. Frontend & Backend Development

**Frontend:**
Frontend dibangun menggunakan native PHP yang terintegrasi dengan HTML5 dan CSS3. Framework CSS **Bootstrap** digunakan untuk sistem grid dan komponen UI responsif (seperti kartu film, tombol, dan formulir).
-   **Struktur Halaman:**
    -   `header.php`: Menyimpan navigasi (navbar) dan pembukaan tag HTML `<body>`.
    -   `footer.php`: Menyimpan skrip JS, penutup tag `</body>` dan footer halaman.
    -   `index.php`: Halaman utama yang menampilkan daftar film terbaru dalam bentuk grid.
    -   `movie.php`: Halaman detail film yang menampilkan informasi lengkap dan daftar review.

**Backend:**
Logika backend ditulis menggunakan PHP prosedural, dengan pemisahan logika koneksi dan fungsi bantu di folder `inc/`.
-   **Auth System:**
    -   `register.php`: Menangani pendaftaran pengguna baru dengan password hashing (`password_hash`).
    -   `login.php`: Menangani otentikasi pengguna menggunakan session PHP.
-   **Core Logic (`inc/functions.php`):**
    -   `getMovies()`: Mengambil daftar film dari database.
    -   `getMovie()`: Mengambil detail satu film.
    -   `populateMovies()`: Logika otomatis untuk mengambil data dari TMDB API jika database kosong.
    -   `getRatings()`: Mengambil review dan rating pengguna untuk sebuah film.

### B. Database Implementation

Proyek ini menggunakan database MySQL bernama `cinerate`.
**Struktur Tabel:**

1.  **`users`**
    -   `id` (INT, Primary Key, Auto Increment): ID unik pengguna.
    -   `username` (VARCHAR): Nama pengguna.
    -   `email` (VARCHAR): Email pengguna.
    -   `password` (VARCHAR): Password yang terenkripsi.

2.  **`movies`**
    -   `id` (INT, Primary Key, Auto Increment): ID unik film.
    -   `title` (VARCHAR): Judul film.
    -   `year` (VARCHAR/YEAR): Tahun rilis film.
    -   `genre` (VARCHAR): Genre film.
    -   `synopsis` (TEXT): Sinopsis atau ringkasan cerita.
    -   `poster` (VARCHAR): Nama file gambar poster yang tersimpan di `assets/img/`.

3.  **`ratings`**
    -   `id` (INT, Primary Key, Auto Increment): ID unik rating.
    -   `user_id` (INT): Foreign Key ke tabel `users`.
    -   `movie_id` (INT): Foreign Key ke tabel `movies`.
    -   `rating` (INT): Nilai rating (1-5).
    -   `review` (TEXT): Ulasan teks dari pengguna.
    -   `created_at` (DATETIME): Waktu ulasan dibuat.

### C. Integrasi API

Sistem mengintegrasikan **The Movie Database (TMDB) API** untuk mengisi konten film secara otomatis.
-   **Endpoint API:** `https://api.themoviedb.org/3/movie/popular`
-   **Implementasi:**
    -   Fungsi `populateMovies($conn)` di `inc/functions.php` melakukan request HTTP GET ke TMDB.
    -   Data JSON yang diterima di-*parse*, dan gambar poster diunduh secara lokal ke folder `assets/img/`.
    -   Data film disimpan ke tabel `movies` untuk menghindari request berulang ke API (caching data).
    -   Endpoint lokal `api/fetch_movies.php` dapat dipanggil untuk memicu proses pengambilan data ini.

### D. Pengujian (Testing)

Pengujian dilakukan secara manual (Black Box Testing) pada fitur-fitur utama:
1.  **Registrasi & Login:**
    -   Mencoba mendaftar dengan email valid.
    -   Login dengan kredensial salah (harus gagal).
    -   Login dengan kredensial benar (berhasil masuk ke `index.php`).
2.  **Browsing Film:**
    -   Membuka halaman utama, memastikan gambar dan judul muncul.
    -   Memastikan data diambil dari API jika database kosong.
3.  **Search:**
    -   Menggunakan fitur pencarian di `search.php` dengan kata kunci tertentu.
4.  **Rating & Review:**
    -   Mencoba memberi rating saat belum login (harus diarahkan ke login).
    -   Memberi rating dan review saat sudah login, lalu memastikan ulasan muncul di halaman detail.

---

## 2. Diagram Sistem

Berikut adalah alur data dan arsitektur sistem proyek ini:

<img width="8687" height="3081" alt="Chart Diagram Sistem FP PWEB" src="https://github.com/user-attachments/assets/7321bfe9-5eaf-40c2-8718-683b50e5b3e9" />

---

## 3. User Guide

### Persiapan
1.  Pastikan XAMPP terinstall dan berjalan (Apache & MySQL).
2.  Buat database `cinerate` di phpMyAdmin.
3.  Konfigurasi koneksi di `inc/db.php` jika diperlukan (default: user `root`, tanpa password).

### Cara Menggunakan Aplikasi
1.  **Membuka Aplikasi:**
    -   Akses `http://localhost/FinalProjectAminV1` di browser.
    -   Halaman akan otomatis memuat data film dari API jika database masih kosong.

2.  **Mendaftar Akun:**
    -   Klik tombol **Register** di menu navigasi.
    -   Isi username, email, dan password, lalu submit.

3.  **Login:**
    -   Klik tombol **Login**.
    -   Masukkan username dan password yang telah didaftarkan.

4.  **Melihat Detail & Memberi Rating:**
    -   Klik tombol **Detail** pada salah satu kartu film.
    -   Di halaman detail, Anda dapat melihat sinopsis dan daftar review orang lain.
    -   Jika sudah login, Anda dapat memilih bintang (1-5), menulis ulasan, dan klik **Submit** untuk mengirim rating.

5.  **Mencari Film:**
    -   Klik menu **Search** di navigasi.
    -   Ketik judul film yang ingin dicari pada kolom pencarian dan tekan Enter.
  
## Jobdesk


| Nama     | NRP | Tugas                             |
| ------------ | ----------------------------------------------- |----------------------------------------------- |
| Herdian Tri Wardhana   | 502524229 | Frontend, Database, Testing, dan Diagram Kerja  |
| Aminnudin Wijaya    |5025241242| Backend, API, dan Deploy            |

