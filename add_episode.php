<?php
include('auth.php');
include('db.php');

$title = $desc = $bgImage = "";
$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = trim($_POST['title']);
  $desc = trim($_POST['description']);
  $bgImage = trim($_POST['bg_image']);

  if ($title !== "" && $bgImage !== "") {
    $stmt = $conn->prepare("INSERT INTO episodes (title, description, bg_image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $desc, $bgImage);
    if ($stmt->execute()) {
      $success = "✅ Episode added successfully!";
      $title = $desc = $bgImage = "";
    } else {
      $error = "❌ Error: " . $stmt->error;
    }
    $stmt->close();
  } else {
    $error = "⚠️ Title and background image are required!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Episode - Loop of Legends</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      background: linear-gradient(to bottom right, #1a0000, #4d0000, #000);
      font-family: 'Cinzel', serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    .heading {
      position: absolute;
      top: 8%;
      text-align: center;
      color: gold;
      font-size: 2.5rem;
      text-shadow: 0 0 15px crimson, 0 0 35px gold;
      animation: float 3s ease-in-out infinite;
      z-index: 5;
    }

    @keyframes float {
      0%   { transform: translateY(0); }
      50%  { transform: translateY(-5px); }
      100% { transform: translateY(0); }
    }

    .container {
      background: rgba(0, 0, 0, 0.8);
      border-radius: 20px;
      padding: 50px 40px;
      width: 90%;
      max-width: 600px;
      box-shadow: 0 0 25px crimson, 0 0 50px rgba(255, 0, 0, 0.3);
      margin-top: 80px;
    }

    input, textarea {
      width: 100%;
      padding: 14px;
      margin: 12px 0;
      border: none;
      border-radius: 12px;
      font-family: 'Cinzel', serif;
      font-size: 1rem;
      background-color: rgba(255, 255, 255, 0.05);
      color: #fff;
      transition: 0.3s;
    }

    input:focus, textarea:focus {
      outline: none;
      background-color: rgba(255, 255, 255, 0.1);
      box-shadow: 0 0 8px crimson;
    }

    button {
      display: block;
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      background: crimson;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      font-size: 1.05rem;
    }

    button:hover {
      background: gold;
      color: black;
      box-shadow: 0 0 15px gold;
    }

    .msg {
      margin: 15px 0;
      font-weight: bold;
      font-size: 1rem;
    }

    .success { color: lightgreen; }
    .error { color: orange; }

    a {
      display: inline-block;
      margin-top: 20px;
      color: gold;
      font-weight: bold;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    @media (max-width: 600px) {
      .heading {
        font-size: 1.6rem;
        top: 5%;
      }
    }
    .magic-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 28px;
    font-size: 1rem;
    font-family: 'Cinzel', serif;
    color: white;
    background: linear-gradient(to right, #7a0000, #cc0000);
    border: 2px solid crimson;
    border-radius: 30px;
    box-shadow: 0 0 15px crimson;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    text-shadow: 0 0 4px black;
  }

  .magic-btn:hover {
    background: gold;
    color: black;
    border-color: gold;
    box-shadow: 0 0 20px gold, 0 0 30px crimson;
    transform: scale(1.06);
  }
  </style>
</head>
<body>

  <div class="heading">➕ Add New Episode</div>

  <div class="container">
    <?php if ($success): ?><div class="msg success"><?= $success ?></div><?php endif; ?>
    <?php if ($error): ?><div class="msg error"><?= $error ?></div><?php endif; ?>

    <form method="POST">
      <input type="text" name="title" placeholder="📘 Episode Title" value="<?= htmlspecialchars($title) ?>" required>
      <textarea name="description" rows="5" placeholder="📜 Episode Description"><?= htmlspecialchars($desc) ?></textarea>
      <input type="text" name="bg_image" placeholder="🖼️ Background Image Path (e.g., img/bg8.gif)" value="<?= htmlspecialchars($bgImage) ?>" required>
      <button type="submit" class="magic-btn">➕ Add Episode</button>
    </form>

    <a href="manage_episodes.php">← Back to Manage Episodes</a>
  </div>

</body>
</html>
