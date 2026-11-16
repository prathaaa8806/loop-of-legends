<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Restore the game by setting deleted = 0
    $sql = "UPDATE games SET deleted = 0 WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_games.php?restored=1");
        exit;
    } else {
        echo "Error restoring game: " . $conn->error;
    }
} else {
    echo "Invalid Game ID";
}
?>
