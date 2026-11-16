<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = (int) $_GET['id'];

  // Soft delete: mark as deleted = 1
  $stmt = $conn->prepare("UPDATE login_users SET deleted = 1 WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header("Location: manage_users.php?deleted=1");
    exit();
  } else {
    header("Location: manage_users.php?error=1");
    exit();
  }

  $stmt->close();
} else {
  header("Location: manage_users.php");
  exit();
}
?>
