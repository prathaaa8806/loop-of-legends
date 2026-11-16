<?php
include('db.php');

$message = "";
$color = "gold";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $hash = hash('sha256', $password);

    // Check if user/email already exists
    $check = $conn->prepare("SELECT * FROM admin_users WHERE LOWER(username) = LOWER(?) OR LOWER(email) = LOWER(?)");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $message = "⚠️ Username or Email already exists!";
        $color = "crimson";
    } else {
        $insert = $conn->prepare("INSERT INTO admin_users (username, email, password_hash) VALUES (?, ?, ?)");
        $insert->bind_param("sss", $username, $email, $hash);
        if ($insert->execute()) {
            $message = "✅ Registration successful!";
            $color = "lime";
        } else {
            $message = "❌ Something went wrong!";
            $color = "crimson";
        }
        $insert->close();
    }

    $check->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Registration - Loop of Legends</title>
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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

    .register-box {
      background: #111;
      padding: 35px 30px;
      border-radius: 20px;
      box-shadow: 0 0 18px crimson;
      text-align: center;
      width: 360px;
      animation: fadeIn 0.7s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    .register-box h2 {
      color: #fff;
      margin-bottom: 20px;
      font-size: 1.7rem;
    }

    .input-box {
      display: flex;
      align-items: center;
      background-color: #1e1e1e;
      padding: 10px 12px;
      margin-top: 12px;
      border-radius: 8px;
      box-shadow: inset 0 0 5px #700000;
    }

    .input-box i {
      color: #ff6600;
      margin-right: 10px;
      font-size: 1.1rem;
    }

    .input-box input {
      background: none;
      border: none;
      outline: none;
      color: white;
      font-family: 'Cinzel', serif;
      font-size: 0.95rem;
      flex: 1;
    }

    button {
      margin-top: 20px;
      padding: 12px 25px;
      background: linear-gradient(to right, #ff4d00, #990000);
      color: white;
      font-weight: bold;
      font-size: 1rem;
      border: none;
      border-radius: 14px;
      font-family: 'Cinzel', serif;
      cursor: pointer;
      box-shadow: 0 0 18px crimson;
      transition: 0.3s ease-in-out;
    }

    button:hover {
      transform: scale(1.07);
      box-shadow: 0 0 25px gold;
      color: gold;
    }

    .message {
      margin-top: 18px;
      color: <?= $color ?>;
      font-size: 0.95rem;
    }

    .back-link {
      margin-top: 15px;
      font-size: 0.85rem;
    }

    .back-link a {
      color: #ffcc00;
      text-decoration: none;
      transition: 0.3s;
    }

    .back-link a:hover {
      text-decoration: underline;
      color: white;
    }
  </style>
</head>
<body>
  <div class="register-box">
    <h2><i class="fas fa-scroll"></i> Admin Registration</h2>
    <form method="POST" autocomplete="off">
      <div class="input-box">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Choose Username" required />
      </div>
      <div class="input-box">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email Address" required />
      </div>
      <div class="input-box">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Create Password" required />
      </div>

      <button type="submit">🚪 Enter the Console</button>
    </form>

    <div class="message"><?= $message ?></div>

    <div class="back-link">
      <a href="dashboard.php">⬅️ Back to Dashboard</a>
    </div>
  </div>
</body>
</html>
