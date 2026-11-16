<?php
include('auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add New Character - Loop of Legends</title>
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
      min-height: 100vh;
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
      margin-bottom: 20px;
    }

    form {
      background: rgba(0,0,0,0.3);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 20px crimson;
      max-width: 500px;
      width: 90%;
      text-align: left;
    }

    label {
      display: block;
      margin: 14px 0 6px;
      font-size: 1.05rem;
    }

    input, textarea, select {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 2px solid crimson;
      background: rgba(0,0,0,0.6);
      color: #fffbe6;
      font-family: 'Cinzel', serif;
      font-size: 1rem;
      outline: none;
      box-shadow: 0 0 6px crimson;
    }

    input:focus, textarea:focus, select:focus {
      border-color: gold;
      box-shadow: 0 0 12px gold;
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
      display: inline-block;
      margin-top: 25px;
      font-size: 1rem;
      text-align: center;
    }

    .magic-btn:hover {
      background: gold;
      color: black;
      transform: scale(1.05);
      box-shadow: 0 0 18px gold;
    }
  </style>
</head>
<body>

  <h1>➕ Add New Character</h1>

  <div class="top-btn">
    <a href="manage_characters.php" class="magic-btn">🔙 Back</a>
  </div>

  <form action="save_character.php" method="POST">
    <label>Type</label>
    <select name="type" required>
      <option value="">Select...</option>
      <option value="hero">🛡️ Hero</option>
      <option value="villain">👿 Villain</option>
    </select>

    <label>Name</label>
    <input type="text" name="name" required placeholder="Character Name">

    <label>Image Path</label>
    <input type="text" name="image" required placeholder="e.g. img/hero1.jpg">

    <label>Power</label>
    <textarea name="power" rows="3" required placeholder="Describe powers..."></textarea>

    <label>Role / Goal</label>
    <textarea name="role_or_goal" rows="3" required placeholder="Hero's role or Villain's goal..."></textarea>

    <button class="magic-btn" type="submit">💾 Save Character</button>
  </form>

</body>
</html>
