<?php
include('db.php');
session_start();

$error = "";

// ✅ Insert default admin user if not exists
$defaultUsername = 'legends';
$defaultPassword = '6969';
$defaultHash = hash('sha256', $defaultPassword);

$checkSql = "SELECT * FROM admin_users WHERE LOWER(username) = LOWER(?)";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $defaultUsername);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows === 0) {
    $insertSql = "INSERT INTO admin_users (username, password_hash) VALUES (?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("ss", $defaultUsername, $defaultHash);
    $insertStmt->execute();
    $insertStmt->close();
}
$checkStmt->close();

// 🔐 Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_users WHERE LOWER(username) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (hash('sha256', $password) === $row['password_hash']) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $row['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "❌ Incorrect password.";
        }
    } else {
        $error = "⚠️ User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- 🔥 Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Login - Loop of Legends</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(to bottom, #0c0c0c, #1a0000);
      color: white;
      font-family: 'Cinzel', serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-box {
      background: #111;
      padding: 35px 30px;
      border-radius: 20px;
      box-shadow: 0 0 18px crimson;
      text-align: center;
      width: 350px;
      animation: popin 0.7s ease-out;
    }

    @keyframes popin {
      0% {
        opacity: 0;
        transform: scale(0.9);
      }
      100% {
        opacity: 1;
        transform: scale(1);
      }
    }

    .login-box h2 {
      margin-bottom: 20px;
      color: #fff;
      font-size: 1.7rem;
    }

    input {
      width: 100%;
      padding: 12px;
      margin-top: 12px;
      border: none;
      border-radius: 8px;
      font-family: 'Cinzel', serif;
      font-size: 0.95rem;
      outline: none;
    }

    button {
      margin-top: 22px;
      padding: 12px 25px;
      background: linear-gradient(to right, crimson, darkred);
      color: white;
      border: none;
      border-radius: 12px;
      font-weight: bold;
      cursor: pointer;
      font-size: 1rem;
      transition: 0.3s;
    }

    button:hover {
      box-shadow: 0 0 15px red;
      transform: scale(1.06);
    }

    .error {
      color: #ffcc00;
      font-size: 0.9rem;
      margin-top: 12px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>🔐 Admin Login</h2>
    <form method="POST" autocomplete="off">
      <!-- Username input -->
      <input
        type="text"
        name="username"
        placeholder="🧙 Admin Username"
        value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>"
        autocomplete="off"
        required
        autofocus
      />

      <!-- Password input -->
      <input
        type="password"
        name="password"
        placeholder="🔒 Password"
        value=""
        autocomplete="new-password"
        required
      />

      <!-- Submit button -->
      <button type="submit">🔑 Command Realm	</button>

     
    <!-- Back to User Login Magic Button -->
<div style="margin-top: 25px;">
  <a href="index.php" style="
    display: inline-block;
    padding: 12px 25px;
    background: linear-gradient(to right, #ff1a1a, #660000);
    color: white;
    font-weight: bold;
    font-size: 1rem;
    border-radius: 12px;
    text-decoration: none;
    font-family: 'Cinzel', serif;
    box-shadow: 0 0 15px cyan;
    transition: 0.3s;
  " onmouseover="this.style.transform='scale(1.06)'; this.style.boxShadow='0 0 25px cyan';"
     onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 15px cyan';">
    🔙 Back To Home
  </a>
</div>
 <!-- Forgot Password link -->
<div style="margin-top: 15px;">
  <a href="reset-password.php" style="color: #ffcc00; text-decoration: none; font-size: 0.85rem;">
    🔁 Forgot Password?
  </a>
</div>
  </div>


     


      <!-- Error display -->
      <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
    </form>
  </div>

  <!-- Optional Script -->
  <script>
    // Enter key on password triggers form submit
    document.querySelector("input[name='password']").addEventListener("keypress", function(e) {
      if (e.key === "Enter") {
        this.form.submit();
      }
    });
  </script>
</body>
</html>
