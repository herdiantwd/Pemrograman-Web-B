<?php
// Ambil film terbaru
function getMovies($conn, $limit = 12)
{
    $sql = "SELECT * FROM movies ORDER BY id DESC LIMIT $limit";
    $result = $conn->query($sql);
    return $result;
}

// Ambil detail film berdasarkan id
function getMovie($conn, $id)
{
    $stmt = $conn->prepare("SELECT * FROM movies WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Ambil rating film
function getRatings($conn, $movie_id)
{
    $stmt = $conn->prepare("SELECT r.*, u.username FROM ratings r JOIN users u ON r.user_id=u.id WHERE movie_id=? ORDER BY created_at DESC");
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    return $stmt->get_result();
}


// Fungsi untuk populate data jika kosong (dari api/fetch_movies.php)
function populateMovies($conn)
{
    $api_key = "7a5d68d8025fbb076e810855cb3fe36c";

    // URL endpoint TMDB (ambil film populer)
    $url = "https://api.themoviedb.org/3/movie/popular?api_key=$api_key&language=en-US&page=1";

    // Ambil JSON dari TMDB
    $response = @file_get_contents($url); // Suppress warning, handle check below
    $data = json_decode($response, true);

    if (!$data || !isset($data['results'])) {
        return false; // Gagal fetch
    }

    foreach ($data['results'] as $movie) {
        $title = $conn->real_escape_string($movie['title']);
        $year = substr($movie['release_date'], 0, 4);
        $genre = "";
        $synopsis = $conn->real_escape_string($movie['overview']);
        $poster = $movie['poster_path'];

        $save_path = __DIR__ . "/../assets/img/";

        //Memasukkan poster 
        if ($poster) {
            $poster_url = "https://image.tmdb.org/t/p/w500" . $poster;
            $poster_name = basename($poster_url);

            if (!file_exists($save_path . $poster_name)) {
                @file_put_contents($save_path . $poster_name, file_get_contents($poster_url));
            }
        } else {
            $poster_name = "default.jpg";
        }

        // Cek apakah film sudah ada
        $check = $conn->prepare("SELECT id FROM movies WHERE title=?");
        $check->bind_param("s", $title);
        $check->execute();
        $check_result = $check->get_result();

        if ($check_result->num_rows == 0) {
            // Insert ke database
            $stmt = $conn->prepare("INSERT INTO movies (title, year, genre, synopsis, poster) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $title, $year, $genre, $synopsis, $poster_name);
            $stmt->execute();
        }
    }
    return true;
}
?>