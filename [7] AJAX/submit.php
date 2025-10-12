<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $data = "Nama: $name\nEmail: $email\nPesan: $message\n\n";
    file_put_contents("messages.txt", $data, FILE_APPEND);

    echo "Terima kasih, $name! Pesan kamu sudah diterima.";
} else {
    http_response_code(405);
    echo "Metode tidak diizinkan.";
}
?>
