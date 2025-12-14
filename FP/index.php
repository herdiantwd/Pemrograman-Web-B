<?php
include 'inc/db.php';
include 'inc/functions.php';
$movies = getMovies($conn);

// Auto-populate jika database kosong
if ($movies->num_rows == 0) {
    populateMovies($conn);
    // Refresh variable movies setelah populate
    $movies = getMovies($conn);
}

include 'inc/header.php';
?>

<div>
    <h1 class="mb-4 putih">Latest Movies</h1>
    <div class="row">
        <?php while ($movie = $movies->fetch_assoc()): ?>
            <div class="col-md-3 mb-4">
                <div class="movie-card">

                    <!-- Container poster -->
                    <div class="poster-wrapper">
                        <img src="assets/img/<?= $movie['poster'] ?>" alt="<?= $movie['title'] ?>" class="movie-poster">
                    </div>

                    <!-- Panel hitam bawah -->
                    <div class="movie-info">
                        <h5 class="movie-title"><?= $movie['title'] ?> (<?= $movie['year'] ?>)</h5>

                        <a href="movie.php?id=<?= $movie['id'] ?>" class="btn btn-outline-light btn-sm w-100 movie-btn">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'inc/footer.php'; ?>