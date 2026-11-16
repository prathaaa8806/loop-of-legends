<?php
include('auth.php');
include('db.php');

$uploadError = '';
$successMsg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $conn->real_escape_string($_POST['title']);
  $category = $conn->real_escape_string($_POST['category']); // ✅ New category field

  if (!empty($_FILES["image"]["name"])) {
    $targetDir = "img/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . time() . '_' . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($fileType, $allowedTypes)) {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // ✅ Insert with category
        $stmt = $conn->prepare("INSERT INTO gallery (title, image_path, category) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $targetFilePath, $category);

        if ($stmt->execute()) {
          $successMsg = "✅ Image added successfully!";
        } else {
          $uploadError = "❌ Failed to insert into database.";
        }
      } else {
        $uploadError = "❌ Failed to upload image.";
      }
    } else {
      $uploadError = "❌ Only JPG, JPEG, PNG, GIF, or WEBP allowed.";
    }
  } else {
    $uploadError = "❌ Please select an image to upload.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>➕ Add Gallery Image | Loop of Legends</title>

  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #1a0000, #330000);
      color: gold;
      font-family: 'Cinzel', serif;
      padding: 50px 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      text-shadow: 0 0 12px crimson;
    }

    .form-container {
      max-width: 600px;
      margin: auto;
      background-color: #1a0000;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 20px crimson;
      border: 2px solid crimson;
    }

    label {
      font-weight: bold;
      color: #ffc;
    }

    .form-control {
      background-color: #000;
      color: white;
      border: 1px solid crimson;
    }

    .form-control:focus {
      background-color: #111;
      color: gold;
      box-shadow: 0 0 10px crimson;
    }

    .magic-btn {
      background: linear-gradient(to right, #7a0000, #ff0000);
      color: white;
      font-weight: bold;
      padding: 10px 25px;
      border-radius: 30px;
      border: 2px solid crimson;
      box-shadow: 0 0 10px crimson;
      transition: all 0.3s ease;
    }

    .magic-btn:hover {
      background: gold;
      color: black;
      transform: scale(1.05);
    }

    .alert {
      margin-top: 20px;
      font-weight: bold;
    }

    .back-btn {
      padding: 6px 16px;
      font-size: 0.9rem;
      display: inline-block;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<h2>🖼️ Add New Gallery Image</h2>
<div class="text-center mt-3">
    <a href="manage_gallery.php" class="magic-btn back-btn">🔙 Back</a>
  </div>
<br>

<div class="form-container">
  <?php if ($uploadError): ?>
    <div class="alert alert-danger text-center"><?= $uploadError ?></div>
  <?php endif; ?>

  <?php if ($successMsg): ?>
    <div class="alert alert-success text-center"><?= $successMsg ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="title" class="form-label">📝 Image Title</label>
      <input type="text" class="form-control" name="title" id="title" required>
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">📂 Select Category</label>
      <select class="form-control" name="category" id="category" required>
        <option value="kingdom">🏰 Kingdom</option>
        <option value="game">🎮 Game</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">📁 Choose Image</label>
      <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
    </div>

    <div class="text-center">
      <button type="submit" class="magic-btn">➕ Upload</button>
    </div>
  </form>

  </div>

</body>
</html>
