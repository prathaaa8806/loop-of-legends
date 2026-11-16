<?php
include('auth.php');
include('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $type = $conn->real_escape_string($_POST['type']);
    $name = $conn->real_escape_string($_POST['name']);
    $image = $conn->real_escape_string($_POST['image']);
    $power = $conn->real_escape_string($_POST['power']);
    $role_or_goal = $conn->real_escape_string($_POST['role_or_goal']);

    $sql = "INSERT INTO characters (type, name, image, power, role_or_goal)
            VALUES ('$type', '$name', '$image', '$power', '$role_or_goal')";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_characters.php?msg=added");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
