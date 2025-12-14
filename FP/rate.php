<?php
include 'inc/db.php';
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if(isset($_POST['movie_id'], $_POST['rating'])) {
    $user_id = $_SESSION['user_id'];
    $movie_id = $_POST['movie_id'];
    $rating = $_POST['rating'];
    $review = $_POST['review'] ?? '';

    $stmt = $conn->prepare("INSERT INTO ratings (user_id, movie_id, rating, review) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $user_id, $movie_id, $rating, $review);
    $stmt->execute();

    header("Location: movie.php?id=$movie_id");
}
?>
