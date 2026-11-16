<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Mark the character as deleted (soft delete)
    $sql = "UPDATE characters SET is_deleted = 1 WHERE id = $id";
    if ($conn->query($sql)) {
        header("Location: manage_characters.php");
        exit();
    } else {
        echo "Error deleting character: " . $conn->error;
    }
} else {
    echo "Invalid character ID.";
}
?>
