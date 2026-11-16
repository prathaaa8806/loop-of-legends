<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = (int) $_GET['id'];

  // Restore: mark as deleted = 0
  $stmt = $conn->prepare("UPDATE contact SET deleted = 0 WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header("Location: view_contacts.php?restored=1");
    exit();
  } else {
    header("Location: view_contacts.php?error=1");
    exit();
  }

  $stmt->close();
} else {
  header("Location: view_contacts.php");
  exit();
}
?>
