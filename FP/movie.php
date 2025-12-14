<?php
include 'inc/db.php';
include 'inc/functions.php';
include 'inc/header.php';

$movie_id = $_GET['id'] ?? 0;
$movie = getMovie($conn, $movie_id);
$ratings = getRatings($conn, $movie_id);
?>

<div class="row">
  <div class="col-md-4">
    <img src="assets/img/<?= $movie['poster'] ?>" class="img-fluid" alt="<?= $movie['title'] ?>">
  </div>
  <div class="col-md-8 putih">
    <h2><?= $movie['title'] ?> (<?= $movie['year'] ?>)</h2>
    <p><strong>Genre:</strong> <?= $movie['genre'] ?></p>
    <p><?= $movie['synopsis'] ?></p>

    <?php if(isset($_SESSION['user_id'])): ?>
    <form action="rate.php" method="post" class="mb-4">
      <input type="hidden" name="movie_id" value="<?= $movie_id ?>">
      <div class="mb-2">
        <label>Rating (1-5):</label>
        <select name="rating" class="form-select w-auto d-inline">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3" selected>3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
      <div class="mb-2">
        <textarea name="review" class="form-control" placeholder="Write a review..."></textarea>
      </div>
      <button type="submit" class="btn btn-success">Submit</button>
    </form>
    <?php else: ?>
      <p><a href="login.php">Login</a> to rate and review this movie.</p>
    <?php endif; ?>

    <h4>Reviews:</h4>
    <?php while($r = $ratings->fetch_assoc()): ?>
      <div class="border p-2 mb-2">
        <strong><?= $r['username'] ?>:</strong> <?= str_repeat('★', $r['rating']) ?> <br>
        <?= $r['review'] ?>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php include 'inc/footer.php'; ?>
