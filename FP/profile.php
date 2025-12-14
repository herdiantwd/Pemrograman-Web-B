<?php
include 'inc/db.php';
include 'inc/functions.php';
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$ratings_stmt = $conn->prepare("SELECT r.*, m.title, m.poster FROM ratings r JOIN movies m ON r.movie_id=m.id WHERE r.user_id=? ORDER BY r.created_at DESC");
$ratings_stmt->bind_param("i", $user_id);
$ratings_stmt->execute();
$ratings = $ratings_stmt->get_result();

include 'inc/header.php';
?>

<h2 class="putih">Profile: <?= $user['username'] ?></h2>
<p class="putih">Email: <?= $user['email'] ?></p>

<h3 class="putih">Your Reviews</h3>
<div class="row">
<?php while($r = $ratings->fetch_assoc()): ?>
  <div class="col-md-3 mb-4">
    <div class="movie-card">
        <div class="poster-wrapper">
            <img src="assets/img/<?= $r['poster'] ?>" 
                alt="<?= $r['title'] ?>" 
                class="movie-poster">
        </div>      
      <div class="movie-info">
        <h5 class="movie-title"><?= $r['title'] ?></h5>
        <p><?= str_repeat('★', $r['rating']) ?></p>
        <p><?= $r['review'] ?></p>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</div>

<?php include 'inc/footer.php'; ?>
