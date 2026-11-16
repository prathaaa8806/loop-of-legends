<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Restore character (undo soft delete)
    $sql = "UPDATE characters SET is_deleted = 0 WHERE id = $id";
    if ($conn->query($sql)) {
        header("Location: manage_characters.php");
        exit();
    } else {
        echo "Error restoring character: " . $conn->error;
    }
} else {
    echo "Invalid character ID.";
}
?>
