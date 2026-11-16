<?php
include('db.php');

$token = $_GET['token'] ?? '';
$error = '';
$success = '';

// 🛡️ Handle password reset form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';

    if ($token && $newPassword) {
        $stmt = $conn->prepare("SELECT * FROM admin_users WHERE reset_token = ? AND token_expiry > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $hash = hash('sha256', $newPassword);

            // Update password & clear token
            $update = $conn->prepare("UPDATE admin_users SET password_hash = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?");
            $update->bind_param("ss", $hash, $token);
            $update->execute();

            $success = "✅ Password has been successfully reset!";
        } else {
            $error = "❌ Invalid or expired token.";
        }
    } else {
        $error = "⚠️ Please enter a new password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Your Password - Loop of Legends</title>
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

    .reset-box {
      background: #111;
      padding: 40px 35px;
      border-radius: 20px;
      box-shadow: 0 0 18px crimson;
      text-align: center;
      max-width: 450px;
    }

    .reset-box h2 {
      font-size: 1.5rem;
      margin-bottom: 20px;
      color: #ffcc00;
    }

    input {
      width: 100%;
      padding: 12px;
      margin-top: 14px;
      border-radius: 8px;
      border: none;
      background-color: #1e1e1e;
      color: white;
      font-family: 'Cinzel', serif;
      font-size: 0.95rem;
      box-shadow: inset 0 0 5px #700000;
    }

    button {
      margin-top: 20px;
      padding: 12px 25px;
      background: linear-gradient(to right, #aa0000, darkred);
      color: white;
      border: none;
      border-radius: 12px;
      font-weight: bold;
      font-size: 1rem;
      cursor: pointer;
      transition: 0.3s;
      font-family: 'Cinzel', serif;
    }

    button:hover {
      box-shadow: 0 0 15px red;
      transform: scale(1.05);
    }

    .message {
      margin-top: 18px;
      font-size: 0.95rem;
    }

    .success {
      color: lime;
    }

    .error {
      color: #ff6666;
    }

    .back-link {
      margin-top: 20px;
    }

    .back-link a {
      color: #ffcc00;
      text-decoration: none;
      font-size: 0.85rem;
    }

    .back-link a:hover {
      text-decoration: underline;
      color: white;
    }
  </style>
</head>
<body>
  <div class="reset-box">
    <h2>🔑 Reset Your Password</h2>

    <?php if ($success): ?>
      <div class="message success"><?= $success ?></div>
      <div class="back-link"><a href="admin.php">⬅️ Go to Login</a></div>
    <?php elseif ($error): ?>
      <div class="message error"><?= $error ?></div>
    <?php endif; ?>

    <?php if (!$success): ?>
      <form method="POST">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>" />
        <input type="password" name="new_password" placeholder="🗝️ New Password" required />
        <button type="submit">🔒 Reset Password</button>
      </form>
    <?php endif; ?>
  </div>
</body>
</html>
