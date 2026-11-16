<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($_SESSION['user_name'])) {
    echo "unauthorized"; exit();
  }

  $user_name = $_SESSION['user_name'];
  $rating = intval($_POST['rating']);
  $your_message = htmlspecialchars(trim($_POST['your_message']));

  $stmt = $conn->prepare("INSERT INTO reviews (user_name, rating, your_message) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $user_name, $rating, $your_message);

  if ($stmt->execute()) {
    echo "success";
  } else {
    echo "error";
  }

  $stmt->close();
  $conn->close();
}
?>
