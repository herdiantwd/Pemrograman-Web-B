<?php
include 'inc/db.php';
include 'inc/header.php';

if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$message = '';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit;
    } else {
        $message = "Invalid username or password";
    }
}
?>

<h2 class="putih">Login</h2>
<form method="post">
  <div class="mb-3">
    <input type="text" name="username" class="form-control" placeholder="Username" required>
  </div>
  <div class="mb-3">
    <input type="password" name="password" class="form-control" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <p class="text-danger"><?= $message ?></p>
</form>


<?php include 'inc/footer.php'; ?>
