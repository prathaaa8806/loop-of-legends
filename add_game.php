<?php
include('auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add New Game - Loop of Legends</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(to bottom right, #1a0000, #330000);
      font-family: 'Cinzel', serif;
      color: #ffd700;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    h1 {
      text-shadow: 0 0 10px crimson, 0 0 20px gold;
      margin-bottom: 20px;
    }

    .top-btn {
      margin-bottom: 25px;
    }

    .magic-btn {
      background: linear-gradient(to right, #7a0000, #ff0000);
      color: white;
      font-weight: bold;
      padding: 12px 26px;
      border-radius: 30px;
      border: 2px solid crimson;
      text-decoration: none;
      box-shadow: 0 0 12px crimson;
      transition: all 0.3s ease;
      font-size: 1rem;
    }

    .magic-btn:hover {
      background: gold;
      color: black;
      transform: scale(1.05);
      box-shadow: 0 0 18px gold;
    }

    form {
      background: rgba(0, 0, 0, 0.4);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 25px crimson;
      text-align: left;
      max-width: 500px;
      width: 100%;
    }

    label {
      display: block;
      margin: 14px 0 6px;
      font-size: 1.1rem;
      color: #ffd700;
      text-shadow: 0 0 4px #ff3333;
    }

    input, textarea {
      width: 100%;
      padding: 12px 15px;
      border-radius: 10px;
      border: 2px solid crimson;
      background: rgba(0, 0, 0, 0.6);
      color: #fffbe6;
      font-family: 'Cinzel', serif;
      font-size: 1rem;
      outline: none;
      transition: 0.3s;
      box-shadow: 0 0 5px #ff3333;
    }

    input:focus, textarea:focus {
      border-color: gold;
      box-shadow: 0 0 10px gold;
      background-color: rgba(255, 255, 255, 0.05);
    }

    button[type="submit"] {
      display: inline-block;
      margin-top: 25px;
    }

  </style>
</head>
<body>

  <h1>➕ Add New Game</h1>
  <br>

  <div class="top-btn">
    <a href="manage_games.php" class="magic-btn">🔙 Back to Games</a>
  </div>
  <br>

  <form action="save_game.php" method="POST">
    <label>Game Title</label>
    <input type="text" name="title" required>

    <label>Description</label>
    <textarea name="description" rows="3" required></textarea>

    <label>Game Link (iframe embed URL)</label>
    <input type="url" name="iframe_url" required>

    <button type="submit" class="magic-btn">💾 Save Game</button>
  </form>

</body>
</html>
