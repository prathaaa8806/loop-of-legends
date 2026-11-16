<?php
include('db.php');

$response = "";
$color = "gold";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $sql = "SELECT * FROM admin_users WHERE LOWER(email) = LOWER(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        // 🔐 Generate reset token & expiry
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime("+15 minutes"));

        // 💾 Update DB
        $update = $conn->prepare("UPDATE admin_users SET reset_token=?, token_expiry=? WHERE email=?");
        $update->bind_param("sss", $token, $expiry, $email);
        $update->execute();

        // 🔗 Create reset link
        $resetLink = "http://localhost:8080/Loop%20Of%20Legends/reset-password-form.php?token=$token";

        // ✅ Output for demo (real project: send email)
        $response = "📨 Reset link generated:<br><a href='$resetLink' target='_blank' style='color:gold;'>$resetLink</a>";
        $color = "lime";
    } else {
        $response = "⚠️ No account found with that email.";
        $color = "crimson";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Password Reset Status</title>
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom, #0c0c0c, #1a0000);
      font-family: 'Cinzel', serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      color: white;
    }

    .response-box {
      background: #111;
      padding: 40px 35px;
      border-radius: 20px;
      box-shadow: 0 0 18px crimson;
      text-align: center;
      max-width: 600px;
      word-wrap: break-word;
    }

    .response-box h2 {
      font-size: 1.4rem;
      margin-bottom: 15px;
    }

    .message {
      font-size: 1rem;
      color: <?= $color ?>;
      margin-top: 10px;
      line-height: 1.6;
      overflow-wrap: break-word;
      word-wrap: break-word;
      white-space: normal;
    }

    a.magic-btn {
      display: inline-block;
      margin-top: 25px;
      padding: 12px 25px;
      background: linear-gradient(to right, #7f0000, #cc0000);
      color: white;
      font-weight: bold;
      font-size: 1rem;
      border-radius: 14px;
      text-decoration: none;
      font-family: 'Cinzel', serif;
      box-shadow: 0 0 18px crimson;
      transition: 0.3s ease-in-out;
    }

    a.magic-btn:hover {
      transform: scale(1.07);
      box-shadow: 0 0 25px gold;
      color: gold;
    }
  </style>
</head>
<body>
  <div class="response-box">
    <h2>🔁 Password Reset</h2>
    <div class="message"><?= $response ?></div>
    <a href="admin.php" class="magic-btn">⬅️ Back to Login</a>
  </div>
</body>
</html>
