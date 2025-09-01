# Membuat Profil Web Sederhana

Disini saya membuat profil web sederhana yang memuat element heading, list, form, image, tabel dan link

Berikut merupakan dokumentasi dari web sederhana yang telah saya buat 

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/93819dcc-263e-4fd4-b1c2-1f3292f8f20b" />



Source code :

```html
<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>
</head>
<body>
    <!-- Heading -->
    <h1>Profil Mahasiswa</h1>

    <!-- Paragraf -->
    <p>Halo! Nama saya <b>Herdian Tri Wardhana</b>. Saya seorang mahasiswa jurusan Teknik Informatika 
    di ITS yang saat ini sedang menjalani mata kuliah Pemrograman Web.</p>

    <!-- Gambar -->
    <img src="../img/Herdian.jpeg" alt="Foto Profil" width="100">

    <!-- List -->
    <h2>Hobi Saya:</h2>
    <ul>
        <li>Kulineran</li>
        <li>Olahraga</li>
        <li>Gaming</li>
    </ul>

    <!-- Tabel -->
    <h2>Pendidikan</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Jenjang Pendidikan</th>
            <th>Nama Instansi</th>
            <th>Periode</th>
        </tr>
        <tr>
            <td>SMA</td>
            <td>SMA Ar-Rohmah Dau Malang</td>
            <td>2019 - 2021</td>
        </tr>
        <tr>
            <td>Sarjana (S-1)</td>
            <td>Institut Teknologi Sepuluh Nopember</td>
            <td>2024 - Sekarang</td>
        </tr>
    </table>

    <!-- Form -->
    <h3>Kontak Saya</h3>
    <form>
        <label>Nama:</label><br>
        <input type="text" name="nama"><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Pesan:</label><br>
        <textarea name="pesan" rows="4" cols="30"></textarea><br><br>

        <input type="submit" value="Kirim">
    </form>

    <!-- Link -->
    <p> Media Sosial Saya <br>
        <a href="https://www.instagram.com/herdiantwd_">Instagram</a>
        <a href="https://www.linkedin.com/in/herdian-tri-wardhana-47093b306/">Linkedin</a>
        <a href="https://github.com/herdiantwd">Github</a>
    </p>
</body>
</html>
```
