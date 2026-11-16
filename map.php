<?php include ('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🗺️ Realm Map | Loop of Legends</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: radial-gradient(circle, #0a0a0a, #1a001a);
      color: #fff;
      font-family: 'Cinzel', serif;
      overflow-x: hidden;
      margin: 0;
      padding-bottom: 0;
    }

    h1 {
      text-shadow: 0 0 15px crimson;
      color: #ff2e2e;
      font-size: 2.7rem;
      text-transform: uppercase;
    }

    .map-container {
      max-width: 1000px;
      margin: 40px auto;
      position: relative;
      border: 2px solid crimson;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 0 30px crimson;
      cursor: grab;
      transition: box-shadow 0.3s ease;
    }

    .map-container:hover {
      box-shadow: 0 0 50px #ff0055;
    }

    .realm-map {
      width: 100%;
      transition: transform 0.5s ease;
      transform-origin: center center;
    }

    .zoomed {
      transform: scale(1.8);
    }

    .realm-marker {
      position: absolute;
      padding: 6px 12px;
      background: rgba(255, 0, 80, 0.95);
      color: white;
      border-radius: 12px;
      font-size: 0.9rem;
      cursor: pointer;
      animation: pulse 2s infinite;
      text-shadow: 0 0 5px #000;
      border: 1px solid #fff;
      transition: transform 0.3s ease;
    }

    .realm-marker:hover {
      transform: scale(1.1);
    }

    @keyframes pulse {
      0% { box-shadow: 0 0 0px crimson; }
      50% { box-shadow: 0 0 15px #ff0077; }
      100% { box-shadow: 0 0 0px crimson; }
    }

    .chat-popup {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: #1a001a;
      border: 2px solid crimson;
      border-radius: 12px;
      max-width: 300px;
      width: 100%;
      padding: 15px 20px;
      box-shadow: 0 0 20px crimson;
      display: none;
      z-index: 999;
      overflow: hidden;
      word-wrap: break-word;
    }

    .chat-popup h5 {
      color: crimson;
      font-size: 1rem;
      margin-bottom: 8px;
    }

    .chat-popup p {
      font-size: 0.9rem;
      color: #ddd;
      margin: 0;
      max-height: 180px;
      overflow-y: auto;
      line-height: 1.4;
      white-space: pre-line;
    }

    .chat-close {
      position: absolute;
      top: 6px;
      right: 10px;
      font-size: 1rem;
      color: #ccc;
      cursor: pointer;
    }

    .slim-footer {
      background: linear-gradient(90deg, #1a001a, #000);
      color: white;
      font-size: 0.9rem;
      border-top: 1px solid crimson;
      box-shadow: 0 -2px 10px rgba(255, 0, 0, 0.3);
      padding: 15px 0;
      width: 100%;
      z-index: 1;
    }

    .footer-links a { color: #ff9999; text-decoration: none; }
    .footer-links a:hover { text-decoration: underline; }

    .footer-brand { font-weight: bold; color: crimson; font-size: 1.2rem; }

    .footer-legal a {
      color: #ff7777;
      font-weight: 500;
      text-decoration: none;
    }
    .footer-legal a:hover { text-decoration: underline; }

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

<!-- 🗺️ Heading -->
<div class="container text-center">
  <h1 class="my-4">🗺️ Explore the Realms</h1>
  <p>Click any realm signal to zoom and receive a mysterious transmission.</p>
</div>

<!-- 🗺️ Zoomable Map -->
<div class="map-container" id="mapBox">
  <img src="img/kingdom_of_ember_kingdom_of_glacia_kingdom_of_syliva_kingdom.jpeg" alt="Fantasy Realm Map" class="realm-map" id="mapImage">

  <!-- Markers -->
  <div class="realm-marker" style="top: 55%; left: 65%;" onclick="showSignal('Glacia', '❄️ Ice winds report a massive mana surge. Northern gates are unstable...')">❄️ Glacia</div>
  <div class="realm-marker" style="top: 25%; left: 30%;" onclick="showSignal('Ember', '🔥 Firelords are awakening. A new enemy emerges beneath the ash.')">🔥 Ember</div>
  <div class="realm-marker" style="top: 45%; left: 50%;" onclick="showSignal('Syliva', '🌿 Spirit vines have captured a rogue spell. Wisdom is whispering...')">🌿 Syliva</div>
  <div class="realm-marker" style="top: 45%; left: 7%;" onclick="showSignal('Zephyrus', '🌬️ Winds of fate stir in silence. A calm before the celestial clash.')">🌬️ Zephyrus</div>
  <div class="realm-marker" style="top: 15%; left: 50%;" onclick="showSignal('Samurai\'s Shadows', '🗡️ Blades whisper through the mist. An ancient honor is awakening.')">🗡️ Samurai's Shadows</div>
  <div class="realm-marker" style="top: 30%; left: 75%;" onclick="showSignal('Elven Rage', '🧝‍♂️ Forest flames roar. The Elves no longer hold back.')">🧝 Elven Rage</div>
</div>

<!-- 💬 Realm Signal Popup -->
<div class="chat-popup" id="chatBox">
  <span class="chat-close" onclick="closeSignal()">✖</span>
  <h5 id="chatTitle">Realm</h5>
  <p id="chatMessage">Message goes here.</p>
</div>

<script>
const mapImage = document.getElementById("mapImage");
const chatBox = document.getElementById("chatBox");
const chatTitle = document.getElementById("chatTitle");
const chatMessage = document.getElementById("chatMessage");
const signalSound = new Audio("ping.mp3");

// 🗺️ Toggle Zoom
document.getElementById("mapBox").addEventListener("click", () => {
  mapImage.classList.toggle("zoomed");
});

// ✉️ Signal with spaced typing
function showSignal(realm, message) {
  signalSound.play();
  chatTitle.innerText = `🔔 Signal from ${realm}`;
  chatMessage.innerText = "";
  chatBox.style.display = "block";

  let index = 0;
  function typeNextChar() {
    if (index < message.length) {
      const char = message.charAt(index);
      chatMessage.innerHTML += (char === ' ') ? '&nbsp;' : char;
      index++;
      setTimeout(typeNextChar, 35);
    }
  }
  typeNextChar();
}

function closeSignal() {
  chatBox.style.display = "none";
}
</script>

<?php include ('footer.php'); ?>

<!-- Bootstrap & Logic -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const logoutBtn = document.getElementById("logoutBtn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", function () {
      window.location.href = "logout.php";
    });
  }
</script>
</body>
</html>
