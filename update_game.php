<?php
include('auth.php');
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $iframe_url = $conn->real_escape_string($_POST['iframe_url']);

    $sql = "UPDATE games SET title='$title', description='$description', iframe_url='$iframe_url' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_games.php?msg=updated");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
