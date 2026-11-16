<?php include ('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>⚔️ Trial of Shadows</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      background: linear-gradient(to bottom, #000000, #1a001a);
      color: white;
      font-family: 'Cinzel', serif;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding: 120px 20px 60px;
      text-align: center;
    }

    .container {
      max-width: 900px;
      width: 100%;
    }

    h1, h3 {
      color: crimson;
      text-shadow: 0 0 10px crimson;
    }

    p {
      color: #ccc;
      line-height: 1.6;
    }

    .iframe-wrapper {
      position: relative;
      width: 100%;
      padding-bottom: 56.25%;
      margin-top: 20px;
      border-radius: 15px;
      box-shadow: 0 0 25px crimson;
      overflow: hidden;
    }

    iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: none;
      border-radius: 15px;
    }

    .btn-complete {
      margin: 30px auto 0;
      padding: 12px 30px;
      background: linear-gradient(to right, #440000, #cc0000);
      color: white;
      border: none;
      border-radius: 30px;
      font-size: 1.1rem;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 0 14px #ff4d4d;
      transition: all 0.3s ease;
      display: block;
    }

    .btn-complete:hover {
      transform: scale(1.1);
      box-shadow: 0 0 20px crimson;
    }

    .fullscreen-btn {
      margin-top: 15px;
      background: linear-gradient(to right, #222, #555);
      color: #fff;
      border: none;
      padding: 8px 18px;
      font-size: 0.9rem;
      font-family: 'Cinzel', serif;
      border-radius: 8px;
      box-shadow: 0 0 10px #ff0044;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .fullscreen-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 0 16px #ff3366;
    }

    .hidden-message {
      display: none;
      margin-top: 30px;
      font-size: 1.2rem;
      color: gold;
      text-shadow: 0 0 8px #ffd700;
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
    }
  </style>
</head>
<body>

<main>
  <div class="container">
    <h1>🌒 Trial of Shadows</h1>
    <p><em>A voice echoes through the void...</em></p>
    <p>“You stand at the edge of fate. Only those who survive the Fray may pass beyond the Rift.”</p>

    <h3>🧟 Trial: Confront the Darkness</h3>
    <p>Battle endless waves of shadow creatures in <strong>Fantasy Madness</strong>. Survive long enough to prove your worth.</p>

    <!-- 🎮 Game Embed Wrapper -->
    <div class="iframe-wrapper">
      <iframe id="fantasyGame" src="https://www.crazygames.com/embed/fantasy-madness" allow="fullscreen; gamepad *;"></iframe>
    </div>

    <!-- 🖥️ Full Screen Button -->
    <button class="fullscreen-btn" onclick="launchFullScreen(document.getElementById('fantasyGame'))">
      🖥️ Play Full Screen
    </button>

    <!-- ✅ Trial Complete Button -->
    <button class="btn-complete" onclick="completeTrial()">✅ I Have Survived</button>

    <!-- 🌌 Message -->
    <div id="message" class="hidden-message">
      🌌 The shadows accept your strength. A new path shall open soon...
    </div>

    <!-- 🔊 Sound Effect -->
    <audio id="surviveSound" src="voice/shadow-king-temple-22641.mp3"></audio>
  </div>
</main>

<!-- Footer -->
<?php include('footer.php'); ?>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
  function completeTrial() {
    document.getElementById("message").style.display = "block";
    const sound = document.getElementById("surviveSound");
    sound.currentTime = 0;
    sound.play();
  }

  // Fullscreen Function
  function launchFullScreen(element) {
    if (element.requestFullscreen) {
      element.requestFullscreen();
    } else if (element.mozRequestFullScreen) { // Firefox
      element.mozRequestFullScreen();
    } else if (element.webkitRequestFullscreen) { // Chrome, Safari, Opera
      element.webkitRequestFullscreen();
    } else if (element.msRequestFullscreen) { // IE/Edge
      element.msRequestFullscreen();
    }
  }
</script>
</body>
</html>
