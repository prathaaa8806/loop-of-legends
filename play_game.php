<?php
include('db.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Invalid Game ID.");
}

$id = $_GET['id'];
$sql = "SELECT * FROM games WHERE id = $id AND deleted = 0";
$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
  die("Game not found.");
}

$game = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= htmlspecialchars($game['title']) ?> - Play</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
    <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      background-color: black;
    }
    #gameFrame {
      width: 100vw;
      height: 100vh;
      border: none;
    }
    #fullscreenBtn {
      position: absolute;
      top: 15px;
      right: 15px;
      z-index: 999;
      padding: 10px 20px;
      background: crimson;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 0 10px gold;
    }
    #fullscreenBtn:hover {
      background: gold;
      color: black;
    }
  </style>
</head>
<body>

<!-- 🔘 Optional Fullscreen Button -->
<button id="fullscreenBtn">⛶ Fullscreen</button>

<!-- 🕹️ Game Frame -->
<iframe id="gameFrame"
        src="<?= htmlspecialchars($game['iframe_url']) ?>"
        allow="fullscreen; gamepad *;"
        allowfullscreen>
</iframe>

<script>
  const btn = document.getElementById('fullscreenBtn');
  const iframe = document.getElementById('gameFrame');

  btn.addEventListener('click', () => {
    if (iframe.requestFullscreen) {
      iframe.requestFullscreen();
    } else if (iframe.webkitRequestFullscreen) {
      iframe.webkitRequestFullscreen();
    } else if (iframe.msRequestFullscreen) {
      iframe.msRequestFullscreen();
    }
  });
</script>

</body>
</html>
