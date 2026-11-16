<?php
include('header.php');
include('db.php');

// Fetch only characters where deleted = 0
$sql = "SELECT * FROM characters WHERE is_deleted = 0";
$result = $conn->query($sql);

$heroes = [];
$villains = [];

if ($result && $result->num_rows > 0) {
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
  <title>Characters - Loop of Legends</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom right, #1a0018ff, #1d021aff);
      font-family: 'Cinzel', serif;
      color: #faf9f7ff;
    }

    h1, h2 {
      text-align: center;
      margin: 50px 0 20px;
      text-shadow: 0 0 10px crimson, 0 0 5px gold;
    }

    .card-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      justify-content: center;
      gap: 30px;
      padding: 40px 20px;
      max-width: 1100px;
      margin: auto;
    }

    .flip-card {
      background-color: transparent;
      width: 100%;
      max-width: 400px;
      height: 300px;
      perspective: 1000px;
      margin: auto;
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      transition: transform 0.8s;
      transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 0 20px crimson;
    }

    .flip-card-front img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .flip-card-back {
      background: rgba(0, 0, 0, 0.85);
      color: #fcfbf4ff;
      transform: rotateY(180deg);
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }

    .flip-card-back h4 {
      font-size: 1.2rem;
      margin-bottom: 10px;
    }

    .flip-card-back p {
      font-size: 0.95rem;
      line-height: 1.4;
    }

    @media (max-width: 992px) {
      .card-container {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      }
    }

    img, iframe, video {
      max-width: 100%;
      height: auto;
      display: block;
      -webkit-user-drag: none;
      user-select: none;
    }

   
    
    .section-divider {
      margin: 60px 0 30px;
      text-align: center;
      font-size: 1.5rem;
      color: #ff0044;
    }

    .slim-footer {
      background: linear-gradient(90deg, #1a001a, #000);
      color: white;
      font-size: 0.9rem;
      border-top: 1px solid crimson;
      box-shadow: 0 -2px 10px rgba(255, 0, 0, 0.3);
      padding: 15px 0;
      width: 100%;
    }

    .footer-links a {
      color: #ff9999;
      text-decoration: none;
    }

    .footer-links a:hover {
      text-decoration: underline;
    }

    .footer-brand {
      font-weight: bold;
      color: crimson;
      font-size: 1.2rem;
    }

    .footer-legal a {
      color: #ff7777;
      font-weight: 500;
      text-decoration: none;
    }

    .footer-legal a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .slim-footer .container {
        flex-direction: column !important;
        align-items: center !important;
        text-align: center !important;
      }

      .footer-links {
        padding: 0;
        margin: 12px 0;
      }

      .footer-links li {
        display: block;
        margin: 6px 0;
      }

      .footer-legal {
        margin-top: 10px;
      }

      .flip-inner {
        height: 250px;
      }

      .hero-section {
        padding: 70px 15px 30px;
        margin-top: 70px;
      }
    }

    body {
      padding-top: 90px;
    }
    h1, h2, .section-divider {
  font-weight: 900 !important;
  color: crimson;
  text-shadow: 0 0 6px #ff0000cc, 0 0 10px #990000aa;
  letter-spacing: 1px;
  font-size: 2rem;
}

  </style>
</head>
<body>

  <!-- ✨ Section Title -->
<h1 style="
  color: #ffd700;
  font-size: 2.8rem;
  text-align: center;
  font-family: 'Cinzel', serif;
  text-shadow: 0 0 10px gold, 0 0 20px crimson;
  margin-bottom: 10px;
">
  ⚔️ Meet the Legends
</h1>

<!-- ✨ Info Subtitle -->
<p style="
  color: white;
  font-size: 1.1rem;
  text-align: center;
  margin-bottom: 40px;
  font-family: 'Cinzel', serif;
">
  Step into a realm where heroes rise, villains scheme, and legends are forged in the fire of fate.
</p>


  <!-- 🛡️ Heroes -->
  <h2>🛡️ Heroes of the Realm</h2>
  <div class="card-container">
    <?php foreach ($heroes as $char): ?>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="<?= $char['image'] ?>" alt="<?= $char['name'] ?>">
          </div>
          <div class="flip-card-back">
            <h4><?= $char['name'] ?></h4>
            <p><strong>Power:</strong><br><?= $char['power'] ?></p>
            <p><strong>Role:</strong><br><?= $char['role_or_goal'] ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- 👿 Villains -->
  <h2>👿 Villains of the Shadows</h2>
  <div class="card-container">
    <?php foreach ($villains as $char): ?>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="<?= $char['image'] ?>" alt="<?= $char['name'] ?>">
          </div>
          <div class="flip-card-back">
            <h4><?= $char['name'] ?></h4>
            <p><strong>Power:</strong><br><?= $char['power'] ?></p>
            <p><strong>Goal:</strong><br><?= $char['role_or_goal'] ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- Storyline -->
    <div class="section-divider" style="
  color: #ffd700;
  font-size: 2.2rem;
  font-family: 'Cinzel', serif;
  text-align: center;
  margin: 60px 0 30px;
  text-shadow: 0 0 10px gold, 0 0 18px crimson;
">
  📖 The Enchanted Realm Storyline
</div>
    <p class="text-center px-3" style="max-width: 900px; margin: 0 auto; opacity: 0.85;">
      In the beginning, the Realms of Ember, Glacia, Syliva, and Zephyrus lived in harmony. But when a forbidden portal known as the Loop was opened, it allowed cursed shadows to return.
      The once-banished Shadow, now Eclipsion, aims to merge all Realms into darkness. Heroes have risen — each bearing the powers of their realm — to battle fate, rewrite legends, and protect the last thread of hope before the Loop closes forever… or consumes all.
    </p>
  </div>
<br>
<br>
<br>

  <?php include ('footer.php') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
