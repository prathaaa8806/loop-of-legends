<?php
include('auth.php');
include('db.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Invalid Image ID");
}

$id = (int)$_GET['id'];
$error = '';
$success = '';

// Fetch current data
$query = "SELECT * FROM gallery WHERE id = $id AND deleted = 0";
$result = $conn->query($query);
$imageData = $result->fetch_assoc();

if (!$imageData) {
  die("Image not found or deleted.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $conn->real_escape_string($_POST['title']);
  $newImagePath = $imageData['image_path']; // default = old image

  if (!empty($_FILES['image']['name'])) {
    $targetDir = "img/";
    $fileName = basename($_FILES["image"]["name"]);
    $newImagePath = $targetDir . time() . '_' . $fileName;
    $fileType = strtolower(pathinfo($newImagePath, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($fileType, $allowedTypes)) {
      if (!move_uploaded_file($_FILES["image"]["tmp_name"], $newImagePath)) {
        $error = "❌ Failed to upload new image.";
      }
    } else {
      $error = "❌ Only JPG, JPEG, PNG, GIF, or WEBP allowed.";
    }
  }

  if (!$error) {
    $stmt = $conn->prepare("UPDATE gallery SET title = ?, image_path = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $newImagePath, $id);

    if ($stmt->execute()) {
      $success = "✅ Image updated successfully!";
      $imageData['title'] = $title;
      $imageData['image_path'] = $newImagePath;
    } else {
      $error = "❌ Failed to update the image.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>✏️ Edit Gallery Image | Loop of Legends</title>
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
      padding: 8px 18px;
      font-size: 0.9rem;
      border-radius: 25px;
      border: 2px solid crimson;
      box-shadow: 0 0 8px crimson;
      transition: all 0.3s ease;
      display: inline-block;
    }

    .magic-btn:hover {
      background: gold;
      color: black;
      transform: scale(1.05);
    }

    .back-btn {
      margin: 10px auto 0;
      font-size: 0.85rem;
      padding: 6px 16px;
    }

    .alert {
      margin-top: 20px;
      font-weight: bold;
    }

    .img-preview {
      width: 100%;
      max-width: 300px;
      margin: 15px auto;
      display: block;
      border-radius: 12px;
      border: 2px solid crimson;
    }
  </style>
</head>
<body>

<h2>✏️ Edit Gallery Image</h2>
<div class="text-center mt-2">
  <a href="manage_gallery.php" class="magic-btn back-btn">🔙 Back</a>
</div>
<br>

<div class="form-container">
  <?php if ($error): ?>
    <div class="alert alert-danger text-center"><?= $error ?></div>
  <?php endif; ?>
  
  <?php if ($success): ?>
    <div class="alert alert-success text-center"><?= $success ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="title" class="form-label">📝 Image Title</label>
      <input type="text" class="form-control" name="title" id="title" value="<?= htmlspecialchars($imageData['title']) ?>" required>
    </div>

    <div class="mb-3 text-center">
      <label class="form-label">🖼️ Current Image</label><br>
      <img src="<?= htmlspecialchars($imageData['image_path']) ?>" class="img-preview" alt="Current Image">
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">📁 Replace Image (optional)</label>
      <input type="file" class="form-control" name="image" id="image" accept="image/*">
    </div>

    <div class="text-center">
      <button type="submit" class="magic-btn">💾 Update</button>
    </div>
  </form>
</div>

</body>
</html>
