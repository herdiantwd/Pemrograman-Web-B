<?php
include 'inc/db.php';

$message = '';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    if($stmt->execute()) {
        $message = "Registration successful. You can now login.";
    } else {
        $message = "Error: " . $conn->error;
    }
}

include 'inc/header.php';
?>

<h2 class="putih">Register</h2>
<form method="post">
  <div class="mb-3">
    <input type="text" name="username" class="form-control" placeholder="Username" required>
  </div>
  <div class="mb-3">
    <input type="email" name="email" class="form-control" placeholder="Email" required>
  </div>
  <div class="mb-3">
    <input type="password" name="password" class="form-control" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-success">Register</button>
  <p class="text-success"><?= $message ?></p>
</form>

<?php include 'inc/footer.php'; ?>
