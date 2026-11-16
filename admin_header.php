<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Loop of Legends - Admin</title>
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Custom Admin Header Styles -->
  <style>
    body {
      margin: 0;
      padding: 0;
      background: radial-gradient(circle at center, #300000, #100000);
      font-family: 'Cinzel', serif;
      color: #ffd700;
    }

    .admin-header {
      background: linear-gradient(145deg, #5a0000, #260000);
      padding: 20px 30px;
      color: #ffd700;
      text-align: center;
      box-shadow: 0 0 20px rgba(255, 0, 0, 0.6);
      border-bottom: 1px solid gold;
    }

    .admin-header h1 {
      font-size: 2.4rem;
      margin: 0;
      text-shadow: 0 0 12px crimson, 0 0 24px gold;
    }

    .admin-header small {
      font-size: 1rem;
      color: #ffcc99;
    }

    .admin-nav {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 16px;
      background: #1a0000;
      padding: 20px 10px;
      box-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
    }

    .admin-nav a {
      text-decoration: none;
      color: #fff2e6;
      font-size: 1.1rem;
      padding: 10px 18px;
      background: rgba(0, 0, 0, 0.4);
      border-left: 5px solid crimson;
      border-radius: 10px;
      box-shadow: 0 0 8px #990000;
      transition: 0.3s ease;
    }

    .admin-nav a:hover {
      background: #660000;
      color: gold;
      box-shadow: 0 0 18px #ff3300;
      transform: scale(1.05);
    }
    #admin-logo {
  transition: transform 0.4s ease, filter 0.4s ease;
  cursor: pointer;
}

#admin-logo:hover {
  transform: scale(1.15) rotate(3deg);
  filter: drop-shadow(0 0 12px gold) brightness(1.2);
}

  </style>
</head>
<body>

  <div class="admin-header">
    <h1>
  <img src="img/mainlogo.png" alt="Logo" id="admin-logo" style="height: 60px; vertical-align: middle; margin-right: 10px;">
  Loop of Legends Admin Panel
</h1>

    <small>Realm Management Console</small>
  </div>

  