<?php
include('auth.php');
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    if (!isset($_POST['title'], $_POST['description'], $_POST['iframe_url'])) {
        die("Missing required fields.");
    }

    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $iframe_url = trim($_POST['iframe_url']);

    // Prepare & bind
    $stmt = $conn->prepare("INSERT INTO games (title, description, iframe_url, deleted) VALUES (?, ?, ?, 0)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sss", $title, $description, $iframe_url);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: manage_games.php?msg=added");
        exit();
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
    }
}
?>
