<?php
include('auth.php');
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>📷 Manage Gallery | Loop of Legends</title>
  <!-- ✅ Favicon -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <style>
  body {
    background: linear-gradient(to bottom right, #1a0000, #330000);
    color: #ffd700;
    font-family: 'Cinzel', serif;
    padding: 40px;
  }

  h1, h2 {
    text-align: center;
    text-shadow: 0 0 12px crimson, 0 0 20px gold;
    margin-bottom: 30px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    background-color: #1a0000;
    box-shadow: 0 0 12px crimson;
    border: 2px solid crimson;
    margin-bottom: 40px;
  }

  th, td {
    padding: 14px;
    border: 1px solid #660000;
    color: #ffeedd;
    text-align: center;
    vertical-align: middle;
  }

  th {
    background-color: #330000;
    color: gold;
    text-shadow: 1px 1px 4px crimson;
  }

  tbody tr:nth-child(even) {
    background-color: #220000;
  }

  tbody tr:nth-child(odd) {
    background-color: #150000;
  }

  tbody tr:hover {
    background-color: #2d0000;
    transition: background 0.3s ease-in-out;
  }

  .magic-btn {
    background: linear-gradient(to right, #7a0000, #ff0000);
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    margin: 5px;
    border-radius: 30px;
    border: 2px solid crimson;
    text-decoration: none;
    box-shadow: 0 0 10px crimson;
    transition: all 0.3s ease;
    display: inline-block;
  }

  .magic-btn:hover {
    background: gold;
    color: black;
    transform: scale(1.05);
    box-shadow: 0 0 15px gold;
  }

  img.gallery-thumb {
    width: 100px;
    height: 60px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid crimson;
    box-shadow: 0 0 8px #ff2222;
  }

  .text-center a {
    display: inline-block;
  }

  /* 📱 Mobile Responsive Table */
  @media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
      display: block;
    }

    thead {
      display: none;
    }

    tr {
      margin-bottom: 20px;
      border: 1px solid crimson;
      padding: 10px;
      background: rgba(0, 0, 0, 0.4);
    }

    td {
      padding: 12px;
      position: relative;
      text-align: left;
    }

    td::before {
      content: attr(data-label);
      font-weight: bold;
      color: gold;
      display: block;
      margin-bottom: 5px;
    }

    .magic-btn {
      display: block;
      margin: 10px 0;
      text-align: center;
    }

    img.gallery-thumb {
      width: 100%;
      height: auto;
      margin-bottom: 10px;
    }
  }
</style>

</head>
<body>

<h1>🖼️ Manage Gallery</h1>

<div class="text-center mb-4">
  <a href="dashboard.php" class="magic-btn">🏠 Back to Dashboard</a>
  <a href="add_gallery_image.php" class="magic-btn">➕ Add Image</a>
</div>

<?php
// ✅ Fetch ACTIVE Kingdom Images
$kingdoms = $conn->query("SELECT * FROM gallery WHERE deleted = 0 AND category = 'kingdom' ORDER BY uploaded_at DESC");

// ✅ Fetch ACTIVE Game Images
$games = $conn->query("SELECT * FROM gallery WHERE deleted = 0 AND category = 'game' ORDER BY uploaded_at DESC");

// ✅ Fetch Deleted Images (all)
$deleted = $conn->query("SELECT * FROM gallery WHERE deleted = 1 ORDER BY uploaded_at DESC");
?>

<!-- ✨ KINGDOM IMAGES -->
<h2>👑 Kingdom Images</h2>
<table>
  <thead>
    <tr>
      <th>Preview</th>
      <th>Title</th>
      <th>Uploaded At</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($kingdoms && $kingdoms->num_rows > 0): ?>
      <?php while ($row = $kingdoms->fetch_assoc()): ?>
        <tr>
          <td data-label="Preview"><img src="<?= htmlspecialchars($row['image_path']) ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="gallery-thumb"></td>
          <td data-label="Title"><?= htmlspecialchars($row['title']) ?></td>
          <td data-label="Uploaded At"><?= htmlspecialchars($row['uploaded_at']) ?></td>
          <td data-label="Actions">
            <a href="edit_gallery_image.php?id=<?= $row['id'] ?>" class="magic-btn">✏️ Edit</a>
            <a href="delete_gallery_image.php?id=<?= $row['id'] ?>" class="magic-btn" onclick="return confirm('Delete this image?')">🗑️ Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="4">No kingdom images found.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<!-- 🎮 GAME IMAGES -->
<h2>🎮 Game Images</h2>
<table>
  <thead>
    <tr>
      <th>Preview</th>
      <th>Title</th>
      <th>Uploaded At</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($games && $games->num_rows > 0): ?>
      <?php while ($row = $games->fetch_assoc()): ?>
        <tr>
          <td data-label="Preview"><img src="<?= htmlspecialchars($row['image_path']) ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="gallery-thumb"></td>
          <td data-label="Title"><?= htmlspecialchars($row['title']) ?></td>
          <td data-label="Uploaded At"><?= htmlspecialchars($row['uploaded_at']) ?></td>
          <td data-label="Actions">
            <a href="edit_gallery_image.php?id=<?= $row['id'] ?>" class="magic-btn">✏️ Edit</a>
            <a href="delete_gallery_image.php?id=<?= $row['id'] ?>" class="magic-btn" onclick="return confirm('Delete this image?')">🗑️ Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="4">No game images found.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<!-- ♻️ RESTORE DELETED IMAGES -->
<h2>♻️ Recently Deleted</h2>
<table>
  <thead>
    <tr>
      <th>Preview</th>
      <th>Title</th>
      <th>Category</th>
      <th>Deleted At</th>
      <th>Restore</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($deleted && $deleted->num_rows > 0): ?>
      <?php while ($row = $deleted->fetch_assoc()): ?>
        <tr>
          <td data-label="Preview"><img src="<?= htmlspecialchars($row['image_path']) ?>" class="gallery-thumb"></td>
          <td data-label="Title"><?= htmlspecialchars($row['title']) ?></td>
          <td data-label="Category"><?= htmlspecialchars($row['category']) ?></td>
          <td data-label="Deleted At"><?= htmlspecialchars($row['uploaded_at']) ?></td>
          <td data-label="Restore">
            <a href="restore_gallery_image.php?id=<?= $row['id'] ?>" class="magic-btn" onclick="return confirm('Restore this image?')">♻️ Restore</a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="5">No deleted images.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
