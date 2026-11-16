<?php
include('auth.php');
include('db.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Invalid Game ID.");
}

$id = $_GET['id'];

$sql = "SELECT * FROM games WHERE id = $id";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
  die("Game not found.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Game - Loop of Legends</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 20px;
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
      padding: 10px 22px;
      border-radius: 30px;
      border: 2px solid crimson;
      text-decoration: none;
      box-shadow: 0 0 10px crimson;
      transition: all 0.3s ease;
      display: inline-block;
      font-size: 1rem;
    }

    .magic-btn:hover {
      background: gold;
      color: black;
      transform: scale(1.05);
      box-shadow: 0 0 15px gold;
    }

    form {
      background: rgba(0, 0, 0, 0.3);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px crimson;
      text-align: left;
      max-width: 500px;
      width: 100%;
    }

    label {
      display: block;
      margin: 12px 0 6px;
      color: #ffd700;
      text-shadow: 0 0 4px #ff3333;
      font-size: 1.05rem;
    }

    input, textarea {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 2px solid crimson;
      background: rgba(0, 0, 0, 0.6);
      color: white;
      font-family: 'Cinzel', serif;
      font-size: 1rem;
      box-shadow: 0 0 5px #ff3333;
      outline: none;
      transition: 0.3s;
    }

    input:focus, textarea:focus {
      border-color: gold;
      box-shadow: 0 0 10px gold;
      background-color: rgba(255, 255, 255, 0.05);
    }

    button[type="submit"] {
      margin-top: 20px;
    }
  </style>
</head>
<body>

<h1>🎮 Edit Game</h1>

<div class="top-btn">
  <a href="manage_games.php" class="magic-btn">🔙 Back</a>
</div>

<form action="update_game.php" method="POST">
  <input type="hidden" name="id" value="<?= $row['id'] ?>">

  <label>Game Title</label>
  <input type="text" name="title" required value="<?= htmlspecialchars($row['title']) ?>">

  <label>Description</label>
  <textarea name="description" rows="3" required><?= htmlspecialchars($row['description']) ?></textarea>

  <label>Game Embed Link</label>
  <input type="text" name="iframe_url" required value="<?= htmlspecialchars($row['iframe_url']) ?>">

  <button class="magic-btn" type="submit">💾 Save Changes</button>
</form>

</body>
</html>
