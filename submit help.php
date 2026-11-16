<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars(trim($_POST['your_name']));
  $email = htmlspecialchars(trim($_POST['email']));
  $question = htmlspecialchars(trim($_POST['question']));

  $sql = "INSERT INTO support_questions (your_name, email, question) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $name, $email, $question);

  if ($stmt->execute()) {
    echo "success";
  } else {
    echo "error";
  }

  $stmt->close();
  $conn->close();
}
?>
