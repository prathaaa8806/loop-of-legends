<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Soft delete by setting deleted = 1
    $sql = "UPDATE games SET deleted = 1 WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_games.php?deleted=1");
        exit;
    } else {
        echo "Error deleting game: " . $conn->error;
    }
} else {
    echo "Invalid Game ID";
}
?>
