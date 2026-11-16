
<?php
include('auth.php');
include('db.php');

// Fetch dynamic episodes from DB
$sql = "SELECT * FROM episodes ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Episodes - Loop of Legends</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom right, #1a0000, #4d0000, #8b0000);
      color: #ffd700;
      font-family: 'Cinzel', serif;
      padding: 40px;
    }

    h1 {
      text-align: center;
      font-size: 2.5rem;
      text-shadow: 0 0 10px crimson, 0 0 25px gold;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: rgba(0, 0, 0, 0.4);
      box-shadow: 0 0 15px crimson;
    }

    th, td {
      padding: 14px;
      border-bottom: 1px solid #ff3333;
      color: #fff;
      text-align: left;
      vertical-align: top;
    }

    th {
      background: #330000;
      color: gold;
    }

    .magic-btn, span.disabled-btn {
      display: inline-block;
      padding: 10px 18px;
      margin: 5px 3px;
      font-size: 0.9rem;
      font-family: 'Cinzel', serif;
      text-decoration: none;
      border-radius: 30px;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .magic-btn {
      background: linear-gradient(to right, #7a0000, #ff0000);
      color: white;
      border: 2px solid crimson;
      box-shadow: 0 0 12px crimson;
      text-shadow: 0 0 3px black;
    }

    .magic-btn:hover {
      background: gold;
      color: black;
      border-color: gold;
      box-shadow: 0 0 20px gold;
      transform: scale(1.04);
    }

    span.disabled-btn {
      background: #333;
      color: #aaa;
      border: 2px solid #555;
      cursor: not-allowed;
    }

    .top-btn {
      text-align: center;
      margin-bottom: 30px;
    }

    img.bg-preview {
      width: 100px;
      height: 60px;
      object-fit: cover;
      border-radius: 6px;
      box-shadow: 0 0 8px crimson;
    }

    .bg-path {
      font-size: 0.8rem;
      color: #ffcccc;
      opacity: 0.8;
    }

    tr.deleted {
      opacity: 0.5;
      text-decoration: line-through;
    }
  </style>
</head>
<body>

<h1>📖 Manage Episodes</h1>

<div class="top-btn">
  <a class="magic-btn" href="add_episode.php">➕ Add New Episode</a>
  <a class="magic-btn" href="dashboard.php">🏠 Back to Dashboard</a>
</div>

<table>
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>BG Image</th>
    <th>Created</th>
    <th>Actions</th>
  </tr>

  <!-- Static Episodes -->
  <?php
  $staticEpisodes = [
    ["📖 Loop of Legends", "Ages ago, the world was united under a celestial harmony. But when the Shadow rose, it shattered the Realms into six elemental kingdoms:
    🔥 Kingdom of Ember — forged in flame, where truth burns illusions.
    ❄️ Kingdom of Glacia — a frozen empire echoing ancient whispers.
    🌿 Kingdom of Syliva — a mystical forest where memories grow like roots.
    🗡️ Samurai’s Shadow — a cursed province veiled in blood, honor, and illusion.
    🎯 Elven Rage — the hidden dominion of wild magic and vengeance-fueled rebellion.🌪️ Kingdom of Zephyrus — storm-ridden skies where nothing is as it seems.
    Now, six heroes rise from each realm. Bound by fate. Chosen to end the illusion... or be consumed by it.
    This isn’t just a tale of kingdoms — this is the Loop of Legends.", "img/Reblog by @shadowandbone · 3 images.gif"],
    ["🔥 Episode 1:  Rise of Ember", "As flames danced in the sky, Adalia Ember awoke from a vision unlike any other—an illusion so real it bled.
    She must master the fire that burns falsehood, journey through volcanic valleys, and discover her fate as the Flame-Wielder of Truth.", "img/emberi.gif"],
    ["❄️ Episode 2:  Echoes of the Realms", "In the frost-covered ruins of Glacia, Wyllan hears whispers buried beneath the ice. Not voices of the past, but echoes of a lie repeated too long.
    He uncovers clues to the Shadow’s earliest manipulations—traced in shattered mirrors and frozen screams.", "img/glacia.gif"],
    ["🌿 Episode 3:  Mirror of Syliva", "In the forest of Syliva, Falencia finds the Mirror of Forgotten Roots—an artifact said to reflect one’s soul and their secrets.
    With each reflection, painful memories return. She must face the lies she believed were true.", "img/dragoni.gif"],
    ["🌪️ Episode 4:  The Zephyrus Encounter", "As storms crack open time, Vethis Zephyrus walks into Umbra—the cursed kingdom of illusion.
    Nothing is real. Everything deceives. The truth isn’t a weapon... but a choice. Will you choose light—or the Shadow Within?", "img/shadowdrag.gif"],
    ["🗡️ Episode 5:  Samurai’s Shadow", "In a realm where honor is currency, Raikuro, the last of the Scarlet Blades, walks alone.
    Cursed by a forgotten warlord, his shadow now moves with a will of its own. To reclaim his soul, Raikuro must face betrayal, break ancient seals, and slay the phantom within.
    Only one truth remains: your greatest enemy lies within.", "img/shadow.gif"],
    ["🧝 Episode 6:  Elven Rage", "After centuries of peace, the Elven Queen Ayelara awakens a forbidden power buried deep beneath the Sylvan roots.
    Consumed by rage and vengeance, she declares war on all who corrupted the land.Will her fury heal the forest—or burn it all to ash?", "img/cenematic.gif"]
 ];
  $staticId = 1;
  foreach ($staticEpisodes as $ep) {
    echo "<tr>
      <td>$staticId</td>
      <td>{$ep[0]}</td>
      <td>{$ep[1]}</td>
      <td>
        <img class='bg-preview' src='{$ep[2]}' alt='bg'>
        <div class='bg-path'>{$ep[2]}</div>
      </td>
      <td>—</td>
      <td><span class='disabled-btn'>🔒 Static</span></td>
    </tr>";
    $staticId++;
  }
  ?>

  <!-- Dynamic Episodes -->
  <?php if ($result && $result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr class="<?= $row['deleted'] ? 'deleted' : '' ?>">
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= nl2br(htmlspecialchars($row['description'])) ?></td>
        <td>
          <?php if (!empty($row['bg_image'])): ?>
            <img class="bg-preview" src="<?= htmlspecialchars($row['bg_image']) ?>" alt="bg">
            <div class="bg-path"><?= htmlspecialchars($row['bg_image']) ?></div>
          <?php else: ?><em>No image</em><?php endif; ?>
        </td>
        <td><?= $row['created_at'] ?></td>
        <td>
          <?php if (!$row['deleted']): ?>
            <a class="magic-btn" href="edit_episode.php?id=<?= $row['id'] ?>">✏️ Edit</a>
            <a class="magic-btn" href="delete_episode.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this episode?');">🗑️ Delete</a>
          <?php else: ?>
            <a class="magic-btn" style="background: royalblue;" href="restore_episode.php?id=<?= $row['id'] ?>">♻️ Restore</a>
          <?php endif; ?>
        </td>
      </tr>
    <?php endwhile; ?>
  <?php else: ?>
    <tr><td colspan="6">No dynamic episodes found.</td></tr>
  <?php endif; ?>
</table>

</body>
</html> 