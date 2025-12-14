<?php
include 'inc/db.php';
include 'inc/functions.php';
include 'inc/header.php';

$keyword = $_GET['q'] ?? '';
$movies = [];

if($keyword) {
    $stmt = $conn->prepare("SELECT * FROM movies WHERE title LIKE ?");
    $search = "%".$keyword."%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $movies = $stmt->get_result();
}
?>

<h2 class="putih">Search Movies</h2>
<form class="mb-4" method="get">
  <div class="input-group">
    <input type="text" name="q" class="form-control" placeholder="Search by title..." value="<?= htmlspecialchars($keyword) ?>">
    <button class="btn btn-primary" type="submit">Search</button>
  </div>
</form>

<div class="row">
<?php if($movies && $movies->num_rows > 0): ?>
  <?php while($movie = $movies->fetch_assoc()): ?>
    <div class="col-md-3 mb-4">
      <div class="movie-card">
        <div class="poster-wrapper">
            <img src="assets/img/<?= $movie['poster'] ?>" 
                alt="<?= $movie['title'] ?>" 
                class="movie-poster">
        </div>
        <div class="movie-info">
          <h5 class="movie-title"><?= $movie['title'] ?> (<?= $movie['year'] ?>)</h5>
          <p class="card-text"><?= substr($movie['synopsis'],0,60) ?>...</p>
            <a href="movie.php?id=<?= $movie['id'] ?>" 
               class="btn btn-outline-light btn-sm w-100 movie-btn">
               Detail
            </a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
<?php else: ?>
  <p class="putih">No movies found.</p>
<?php endif; ?>
</div>

<?php include 'inc/footer.php'; ?>
