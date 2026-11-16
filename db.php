<?php
$host = "localhost";    // mostly localhost in XAMPP
$user = "root";         // default user
$pass = "";             // blank by default in XAMPP
$db   = "loop_of_legends";  // 🟢 yahan tumhara database ka naam daalna hai

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
