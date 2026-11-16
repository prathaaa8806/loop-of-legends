<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = (int) $_GET['id'];

  // Restore the review by setting deleted = 0
  $stmt = $conn->prepare("UPDATE submit_trailer_review SET is_deleted = 0 WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header("Location: manage_trailer_review.php?restored=1");
    exit();
  } else {
    header("Location: manage_trailer_review.php?error=1");
    exit();
  }

  $stmt->close();
} else {
  header("Location: manage_trailer_review.php");
  exit();
}
?>
