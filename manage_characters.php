<?php
include('auth.php');
include('db.php');

// Fetch all characters from DB
$sql = "SELECT * FROM characters";
$result = $conn->query($sql);

// Separate heroes and villains
$heroes = [];
$villains = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($row['type'] === 'hero') {
      $heroes[] = $row;
    } else {
      $villains[] = $row;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Characters - Loop of Legends</title>
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
    vertical-align: top;
    text-align: left;
  }
  th {
    background-color: #330000;
    color: gold;
  }
  img.thumb {
    width: 80px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 0 8px crimson;
  }
  .section-heading {
    margin: 50px 0 20px;
    font-size: 1.8rem;
    color: gold;
    text-shadow: 0 0 5px crimson;
  }
  .top-btn {
    text-align: center;
    margin-bottom: 30px;
  }
  .magic-btn {
    background: linear-gradient(to right, #7a0000, #ff0000);
    color: white;
    font-weight: bold;
    padding: 10px 22px;
    margin: 5px auto;
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
    opacity: 0.5;
    text-decoration: line-through;
  }

  /* 🔁 Mobile Responsive Table */
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
      text-align: left;
    }

    td::before {
      content: attr(data-label);
      font-weight: bold;
      color: gold;
      display: block;
      margin-bottom: 6px;
    }

    img.thumb {
      width: 100%;
      height: auto;
      margin-bottom: 10px;
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

<h1>🧝 Manage Characters of the Enchanted Realm</h1>

<div class="top-btn">
  <a href="dashboard.php" class="magic-btn">🏠 Back to Dashboard</a> &nbsp;
  <a href="add_character.php" class="magic-btn">➕ Add New Character</a>
</div>

<h2 class="section-heading">🛡️ Heroes</h2>
<table>
  <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Power</th>
    <th>Role</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($heroes as $h): ?>
    <tr class="<?= $h['is_deleted'] ? 'deleted-row' : '' ?>">
      <td><img src="<?= $h['image'] ?>" class="thumb"></td>
      <td data-label="Name"><?= $h['name'] ?></td>
<td data-label="Power"><?= $h['power'] ?></td>
<td data-label="Role"><?= $h['role_or_goal'] ?></td>
<td data-label="Actions">

        <a href="edit_character.php?id=<?= $h['id'] ?>" class="magic-btn">✏️ Edit</a>
        <?php if (!$h['is_deleted']): ?>
          <a href="delete_character.php?id=<?= $h['id'] ?>" class="magic-btn" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
        <?php else: ?>
          <a href="restore_character.php?id=<?= $h['id'] ?>" class="magic-btn">♻️ Restore</a>
        <?php endif; ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<h2 class="section-heading">👿 Villains</h2>
<table>
  <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Power</th>
    <th>Goal</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($villains as $v): ?>
    <tr class="<?= $v['is_deleted'] ? 'deleted-row' : '' ?>">
      <td><img src="<?= $v['image'] ?>" class="thumb"></td>
      <td data-label="Name"><?= $h['name'] ?></td>
<td data-label="Power"><?= $h['power'] ?></td>
<td data-label="Role"><?= $h['role_or_goal'] ?></td>
<td data-label="Actions">

        <a href="edit_character.php?id=<?= $v['id'] ?>" class="magic-btn">✏️ Edit</a>
        <?php if (!$v['is_deleted']): ?>
          <a href="delete_character.php?id=<?= $v['id'] ?>" class="magic-btn" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
        <?php else: ?>
          <a href="restore_character.php?id=<?= $v['id'] ?>" class="magic-btn">♻️ Restore</a>
        <?php endif; ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

</body>
</html>
