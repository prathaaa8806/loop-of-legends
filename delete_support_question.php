<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = (int) $_GET['id'];

  // Mark contact as deleted (soft delete)
  $stmt = $conn->prepare("UPDATE support_questions SET deleted = 1 WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header("Location: manage_support_questions.php?deleted=1");
    exit();
  } else {
    header("Location: manage_support_questions.php?error=1");
    exit();
  }

  $stmt->close();
} else {
  header("Location: manage_support_questions.php");
  exit();
}
?>
