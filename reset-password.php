<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Password - Loop of Legends</title>
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
      padding: 35px 30px;
      border-radius: 20px;
      box-shadow: 0 0 18px crimson;
      text-align: center;
      width: 360px;
      animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    .reset-box h2 {
      color: #fff;
      margin-bottom: 20px;
      font-size: 1.5rem;
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
    }

    button:hover {
      box-shadow: 0 0 15px red;
      transform: scale(1.05);
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
  <div class="reset-box">
    <h2>🔁 Reset Admin Password</h2>
    <form method="POST" action="send-reset-link.php" autocomplete="on">
      <input type="email" name="email" placeholder="📨 Enter Registered Email" required />
      <button type="submit">📬 Send Reset Link</button>
    </form>
    <div class="back-link">
      <a href="admin.php">⬅️ Back to Login</a>
    </div>
  </div>
</body>
</html>
