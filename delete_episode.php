<?php
include('auth.php'); // admin login check
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = (int)$_GET['id'];

  // Prepare and execute delete query
  $stmt = $conn->prepare("DELETE FROM episodes WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    // Redirect to manage episodes with success
    header("Location: manage_episodes.php?deleted=1");
    exit();
  }
  else {
    // Redirect with error
    header("Location: manage_episodes.php?error=1");
    exit();
  }

  $stmt->close();
}
else {
  // If no valid ID provided
  header("Location: manage_episodes.php");
  exit();
}
?>
