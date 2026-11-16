<?php
include('auth.php');
include('db.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Invalid character ID.");
}

$id = $_GET['id'];
$sql = "SELECT * FROM characters WHERE id = $id AND is_deleted = 0";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
  die("Character not found.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Character - Loop of Legends</title>
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
      padding: 20px;
    }

    h1 {
      text-shadow: 0 0 10px crimson, 0 0 20px gold;
      margin-bottom: 20px;
    }

    .top-btn {
      margin-bottom: 20px;
    }

    form {
      background: rgba(0,0,0,0.4);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 25px crimson;
      text-align: left;
      max-width: 550px;
      width: 100%;
    }

    label {
      display: block;
      margin: 14px 0 6px;
      font-size: 1.1rem;
      color: #ffd700;
      text-shadow: 0 0 4px #ff3333;
    }

    input, textarea, select {
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

    input:focus, textarea:focus, select:focus {
      border-color: gold;
      box-shadow: 0 0 10px gold;
      background-color: rgba(255, 255, 255, 0.05);
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
    }

    .magic-btn:hover {
      background: gold;
      color: black;
      transform: scale(1.05);
      box-shadow: 0 0 18px gold;
    }

    @media (max-width: 600px) {
      form {
        padding: 25px;
      }
    }
  </style>
</head>
<body>

<h1>✏️ Edit Character</h1>

<div class="top-btn">
  <a href="manage_characters.php" class="magic-btn">🔙 Back</a>
</div>

<form action="update_character.php" method="POST">
  <input type="hidden" name="id" value="<?= $row['id'] ?>">

  <label>Type</label>
  <select name="type" required>
    <option value="hero" <?= $row['type'] === 'hero' ? 'selected' : '' ?>>🛡️ Hero</option>
    <option value="villain" <?= $row['type'] === 'villain' ? 'selected' : '' ?>>👿 Villain</option>
  </select>

  <label>Name</label>
  <input type="text" name="name" required value="<?= htmlspecialchars($row['name']) ?>">

  <label>Image Path</label>
  <input type="text" name="image" required value="<?= htmlspecialchars($row['image']) ?>">

  <label>Power</label>
  <textarea name="power" rows="3" required><?= htmlspecialchars($row['power']) ?></textarea>

  <label><?= $row['type'] === 'hero' ? 'Role' : 'Goal' ?></label>
  <textarea name="role_or_goal" rows="3" required><?= htmlspecialchars($row['role_or_goal']) ?></textarea>

  <button class="magic-btn" type="submit">💾 Save Changes</button>
</form>

</body>
</html>
