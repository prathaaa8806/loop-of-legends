<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = (int) $_GET['id'];

  $stmt = $conn->prepare("UPDATE episodes SET deleted = 0 WHERE id = ?");
  if ($stmt) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
      $stmt->close();
      header("Location: manage_episodes.php?restored=1");
      exit();
    } else {
      $stmt->close();
      header("Location: manage_episodes.php?error=Could not restore episode.");
      exit();
    }
  } else {
    header("Location: manage_episodes.php?error=Query failed.");
    exit();
  }
} else {
  header("Location: manage_episodes.php?error=Invalid ID.");
  exit();
}
?>
