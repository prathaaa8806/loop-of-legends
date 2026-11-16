<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Restore image: set deleted = 0
    $sql = "UPDATE gallery SET deleted = 0 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: manage_gallery.php?msg=restored");
        exit;
    } else {
        echo "❌ Failed to restore image.";
    }

    $stmt->close();
} else {
    echo "❌ Invalid request.";
}
?>
