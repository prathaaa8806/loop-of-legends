<?php
include('auth.php');
include('db.php');

// ✅ Fetch only non-deleted games
$sql = "SELECT * FROM games ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Games - Loop of Legends</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <style>
  body {
    background: linear-gradient(to bottom right, #1a0000, #330000);
    font-family: 'Cinzel', serif;
    color: #ffd700;
    padding: 30px;
  }
  h1 {
    text-align: center;
    text-shadow: 0 0 10px crimson, 0 0 20px gold;
    margin-bottom: 40px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(0,0,0,0.3);
    box-shadow: 0 0 12px crimson;
    margin-bottom: 40px;
  }
  th, td {
    padding: 14px;
    border: 1px solid #ff4444;
    color: white;
    text-align: left;
    vertical-align: top;
  }
  th {
    background-color: #330000;
    color: gold;
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
  .deleted-row {
    opacity: 0.4;
    text-decoration: line-through;
    pointer-events: none;
  }
  .deleted-row td:last-child {
    pointer-events: auto;
    text-decoration: none;
  }

  /* 📱 Mobile Responsive Table */
  @media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
      display: block;
    }

    thead tr {
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
      margin: 8px 0;
      text-align: center;
    }
  }
</style>

</head>
<body>

<h1>🎮 Manage Games</h1>

<div style="text-align: center; margin-bottom: 20px;">
  <a href="dashboard.php" class="magic-btn">🏠 Back to Dashboard</a>
  <a href="add_game.php" class="magic-btn">➕ Add New Game</a>
</div>

<table>
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Link</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()): ?>
    <tr class="<?= $row['deleted'] ? 'deleted-row' : '' ?>">
      <td data-label="Title"><?= htmlspecialchars($row['title']) ?></td>
<td data-label="Description"><?= htmlspecialchars($row['description']) ?></td>
<td data-label="Link"><a href="<?= htmlspecialchars($row['iframe_url']) ?>" target="_blank">🎮 Play</a></td>
<td data-label="Status"><?= $row['deleted'] ? 'Deleted' : 'Active' ?></td>
<td data-label="Actions">

        <a href="edit_game.php?id=<?= $row['id'] ?>" class="magic-btn">✏️ Edit</a>
        <?php if (!$row['deleted']): ?>
          <a href="delete_game.php?id=<?= $row['id'] ?>" class="magic-btn" onclick="return confirm('Delete this game?')">🗑️ Delete</a>
        <?php else: ?>
          <a href="restore_game.php?id=<?= $row['id'] ?>" class="magic-btn">♻️ Restore</a>
        <?php endif; ?>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

</body>
</html>
