<?php
include('auth.php');
include('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id           = (int) $_POST['id'];
    $type         = $conn->real_escape_string($_POST['type']);
    $name         = $conn->real_escape_string($_POST['name']);
    $image        = $conn->real_escape_string($_POST['image']);
    $power        = $conn->real_escape_string($_POST['power']);
    $role_or_goal = $conn->real_escape_string($_POST['role_or_goal']);

    $sql = "UPDATE characters 
            SET type = '$type',
                name = '$name',
                image = '$image',
                power = '$power',
                role_or_goal = '$role_or_goal'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_characters.php?success=1");
        exit;
    } else {
        echo "Error updating character: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
