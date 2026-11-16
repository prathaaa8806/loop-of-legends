<?php
include('db.php'); // ✅ Your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rating = intval($_POST['rating']);
    $message = trim($_POST['your_message']);
    $user = trim($_POST['user_name']);

    if ($rating > 0 && !empty($message) && !empty($user)) {
        $stmt = $conn->prepare("INSERT INTO submit_trailer_review (user_name, rating, your_message) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $user, $rating, $message);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error: " . $stmt->error;
        }
    } else {
        echo "invalid";
    }
}
?>
