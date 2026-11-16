<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = (int) $_GET['id'];

  // Soft delete — mark as deleted
  $stmt = $conn->prepare("UPDATE reviews SET deleted = 1 WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header("Location: manage_reviews.php?deleted=1");
    exit();
  } else {
    header("Location: manage_reviews.php?error=1");
    exit();
  }

  $stmt->close();
} else {
  header("Location: manage_reviews.php");
  exit();
}
?>
