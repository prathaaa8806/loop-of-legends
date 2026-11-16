<?php
include('auth.php');
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Soft delete: mark the image as deleted
    $sql = "UPDATE gallery SET deleted = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: manage_gallery.php?msg=deleted");
        exit;
    } else {
        echo "❌ Failed to delete image.";
    }

    $stmt->close();
} else {
    echo "❌ Invalid request.";
}
?>
