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

1.  **Registrasi & Login:**
    -   Mencoba mendaftar dengan email valid.
        <img width="1913" height="873" alt="image" src="https://github.com/user-attachments/assets/bcaf3cd1-2914-4ec8-8f04-42937dc23a68" /> <br>
        User : Pora T <br>
        Email : porat@gmail.com <br>
        Pass : porat123 <br>
        
    -   Login dengan kredensial salah (harus gagal).
        <img width="1919" height="870" alt="image" src="https://github.com/user-attachments/assets/39afa4d3-763e-4717-853f-42b2aac6aa30" /> <br>
        Ketika salah password maupun user <br>
        
    -   Login dengan kredensial benar (berhasil masuk ke `index.php`).
        <img width="1918" height="875" alt="image" src="https://github.com/user-attachments/assets/5e4d5bf0-c61a-40bf-9f0f-159db06c61ad" /> <br>
        Langsung menuju halaman index
        
2.  **Browsing Film:**
    -   Membuka halaman utama, memastikan gambar dan judul muncul.
        <img width="1919" height="872" alt="image" src="https://github.com/user-attachments/assets/0001cff2-4427-484a-8230-54d545d127c8" />
 
    -   Memastikan data diambil dari API jika database kosong.
        <img width="1919" height="342" alt="image" src="https://github.com/user-attachments/assets/89409634-c34d-4cbe-bd6c-44fe612dbeb5" />

        <img width="1919" height="914" alt="image" src="https://github.com/user-attachments/assets/58a1f597-44ad-4bd7-9f23-963bc94961a2" />


3.  **Search:**
    -   Menggunakan fitur pencarian di `search.php` dengan kata kunci tertentu.
        <img width="1919" height="868" alt="image" src="https://github.com/user-attachments/assets/05bf0958-0358-48cd-9183-5b41ba7617bb" />

4.  **Rating & Review:**
    -   Mencoba memberi rating saat belum login (harus diarahkan ke login).
        <img width="1919" height="863" alt="image" src="https://github.com/user-attachments/assets/f7cbd7db-bdf2-4589-a73a-a01b798cabde" />
  
    -   Memberi rating dan review saat sudah login, lalu memastikan ulasan muncul di halaman detail.
        <img width="1919" height="877" alt="image" src="https://github.com/user-attachments/assets/61307380-0f2f-4392-a7cf-95ea536b4a73" />

        Saat logout, non-login :

        <img width="1919" height="883" alt="image" src="https://github.com/user-attachments/assets/a07d3bbd-fe81-41ff-8587-fd6c36eaff18" />


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
| Herdian Tri Wardhana   | 5025241229 | Frontend, Database, Testing, dan Diagram Kerja  |
| Aminnudin Wijaya    |5025241242| Backend, API, dan Deploy            |

