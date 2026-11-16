<?php
include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>📢 Announcements | Loop of Legends</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: radial-gradient(circle, #0a0a0a 0%, #1a001a 100%);
      color: #fff;
      font-family: 'Cinzel', serif;
    }

    .announcement-title {
      text-align: center;
      font-size: 2.5rem;
      color: crimson;
      margin-top: 40px;
      margin-bottom: 20px;
      text-shadow: 0 0 10px #ff0055;
    }

    .announcement-card {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid crimson;
      border-radius: 15px;
      padding: 20px;
      margin-bottom: 30px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .announcement-card:hover {
      transform: scale(1.02);
      box-shadow: 0 0 15px crimson;
    }

    .announcement-date {
      font-size: 0.9rem;
      color: #ccc;
    }

    .announcement-content {
      font-size: 1rem;
      margin-top: 10px;
    }

    .container {
      max-width: 900px;
    }
    /* DRAGON GLOW SHADOW */
.shadow-dragon {
  box-shadow: 0 0 12px crimson, 0 0 24px #ff2e2e;
}

/* DRAGON RED CLASS */
.dragon-red {
  color: #ff2e2e;
  text-shadow: 2px 2px 8px black;
}

/* 🚫 No extra padding needed now */
body {
  margin: 0;
  padding-bottom: 0;
}

/* 🐉 Normal Footer (Not Fixed) */
.slim-footer {
  /* position: fixed; <-- REMOVED */
  background: linear-gradient(90deg, #1a001a, #000);
  color: white;
  font-size: 0.9rem;
  border-top: 1px solid crimson;
  box-shadow: 0 -2px 10px rgba(255, 0, 0, 0.3);
  padding: 15px 0;
  width: 100%;
  z-index: 1;
}

/* 🔗 Footer Links */
.footer-links a {
  color: #ff9999;
  text-decoration: none;
}
.footer-links a:hover {
  text-decoration: underline;
}

/* 🐲 Brand */
.footer-brand {
  font-weight: bold;
  color: crimson;
  font-size: 1.2rem;
}

/* 📜 Legal Section */
.footer-legal a {
  color: #ff7777;
  font-weight: 500;
  text-decoration: none;
}
.footer-legal a:hover {
  text-decoration: underline;
}

/* 📱 Mobile Responsive Fix */
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
.lightbox {
    display: none;
    position: fixed;
    z-index: 9999;
    background: rgba(0, 0, 0, 0.92);
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    align-items: center;
    justify-content: center;
    text-align: center;
  }

  .lightbox img {
    max-width: 90%;
    max-height: 85vh;
    border-radius: 12px;
    box-shadow: 0 0 25px crimson;
    animation: zoomIn 0.5s ease;
  }

  .close-btn {
    position: absolute;
    top: 30px;
    right: 40px;
    font-size: 40px;
    color: white;
    cursor: pointer;
    z-index: 10000;
  }

  @keyframes zoomIn {
    from { transform: scale(0.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
  }
  </style>
</head>
<body>

  <!-- 🔱 Page Heading -->
  <div class="container">
    <h1 class="announcement-title">📢 Announcements</h1>

    <!-- 🔔 Announcement 1 -->
<div class="announcement-card">
  <h4>⚔️ A New Hero Rises: The Soulbound Guardian</h4>
  <p class="announcement-date">June 26, 2025</p>
  <p class="announcement-content">
    Whispers from the Celestial Forge confirm the arrival of a <strong>new playable hero</strong> — the Soulbound Guardian.  
    Born from fallen stars, their blade burns with forgotten oaths. Unlock their quest to unveil <em>the truth behind the First Flame</em>.
  </p>

  <!-- 🔍 Magical Reveal Hero Button -->
<div class="text-center mt-4">
  <button onclick="toggleHeroReveal()" id="reveal-btn" style="
    padding: 10px 26px;
    background: linear-gradient(to right, #800000, #ff0000);
    color: white;
    font-weight: bold;
    text-decoration: none;
    border: none;
    border-radius: 30px;
    font-size: 1.05rem;
    box-shadow: 0 0 12px #ff3b3b99;
    cursor: pointer;
    font-family: 'Cinzel', serif;
    transition: all 0.3s ease;"
    onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 0 18px #ff5555';"
    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 12px #ff3b3b99';">
    🔍 Reveal Hero
  </button>
</div>

  <!-- 🔥 Hidden Hero Reveal Section -->
<div id="hero-reveal" style="display: none; margin-top: 20px; text-align: center;">
  <div style="width: 200px; height: 200px; margin: auto; border-radius: 12px; overflow: hidden; box-shadow: 0 0 30px crimson, 0 0 10px gold; position: relative;">
    
    <!-- Hero Image -->
    <img src="img/d7bb0ab79c7afdd5daa25a53aaf8c914.jpg" onclick="openLightbox(this)" alt="Soulbound Guardian"
      style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;"
      onmouseover="this.style.transform='scale(1.05)'"
      onmouseout="this.style.transform='scale(1)'">

    <!-- Name Overlay -->
    <div style="position: absolute; bottom: 0; width: 100%; background: rgba(0, 0, 0, 0.6); color: gold; font-family: 'Cinzel', serif; font-size: 14px; padding: 5px 0;">
      🌟 Soulbound Guardian
    </div>
  </div>
</div>
</div>
<!-- 🔍 Lightbox Modal -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
  <span class="close-btn">&times;</span>
  <img id="lightbox-img" src="" alt="Enlarged Image">
</div>
<script>
  function openLightbox(img) {
    document.getElementById("lightbox-img").src = img.src;
    document.getElementById("lightbox").style.display = "flex";
  }

  function closeLightbox() {
    document.getElementById("lightbox").style.display = "none";
  }
</script>

<!-- 🔔 Announcement 2 -->
<div class="announcement-card">
  <h4>🗺️ The World Map Expansion is Here</h4>
  <p class="announcement-date">June 19, 2025</p>
  <p class="announcement-content">
    Introducing the **Interactive Realm Mapper** — explore magical borders, divine structures, and uncharted enemy zones across Glacia, Ember, Syliva, and Umbra.  
    Each click may uncover ancient secrets, coded riddles, or even connections to <strong>real-world anomalies</strong>.  
    Tap into the map, if you dare.
  </p>
  <!-- 🌍 Magical Realm Map Button -->
<div class="text-center mt-5">
  <a href="map.php" class="btn" style="
    padding: 10px 26px;
    background: linear-gradient(to right, #800000, #ff0000);
    color: white;
    font-weight: bold;
    text-decoration: none;
    border-radius: 30px;
    font-size: 1.05rem;
    font-family: 'Cinzel', serif;
    box-shadow: 0 0 12px #ff3b3b99;
    transition: all 0.3s ease;"
    onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 0 18px #ff5555';"
    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 12px #ff3b3b99';">
    🗺️ Launch Realm Signal Map
  </a>
</div>

</div>

<!-- 🔔 Announcement 3 -->
<div class="announcement-card">
  <h4>⚔️ Fray Fight – Enter the Chaos</h4>
  <p class="announcement-date">June 27, 2025</p>
  <p class="announcement-content">
    Dive into a chaotic arena where survival is earned, not given.  
    <strong>“Fray Fight”</strong> throws you into a frenzy of enemies and upgrades.  
    Click below to test your reflexes and rage!
  </p>

  <!-- 🕹️ Magical Fray Fight Button -->
  <div class="text-center mt-4">
    <button onclick="toggleFrayFightGame()" id="fray-toggle-btn" style="
      padding: 10px 26px;
      background: linear-gradient(to right, #800000, #ff0000);
      color: white;
      font-weight: bold;
      text-decoration: none;
      border: none;
      border-radius: 30px;
      font-size: 1.05rem;
      font-family: 'Cinzel', serif;
      box-shadow: 0 0 12px #ff3b3b99;
      cursor: pointer;
      transition: all 0.3s ease;"
      onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 0 18px #ff5555';"
      onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 12px #ff3b3b99';">
      ⚔️ Play Fray Fight
    </button>
  </div>

  <!-- 🕹️ Embedded Game Container -->
  <div id="fray-game-container" style="display: none; margin-top: 20px; position: relative; border-radius: 12px; box-shadow: 0 0 15px rgba(0,0,0,0.6); overflow: hidden;">
    <!-- Iframe Wrapper -->
    <div id="fray-iframe-wrapper" style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0;">
      <iframe id="fray-iframe"
        src="https://www.crazygames.com/embed/fray-fight"
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;"
        allow="fullscreen; gamepad *;">
      </iframe>
    </div>

    <!-- 🔲 Full Screen Button -->
    <div style="text-align: center; margin-top: 10px;">
      <button onclick="launchFullScreen(document.getElementById('fray-iframe'))" style="
        background: linear-gradient(to right, #222, #555);
        color: #fff;
        border: none;
        padding: 8px 18px;
        font-size: 0.9rem;
        font-family: 'Cinzel', serif;
        border-radius: 8px;
        box-shadow: 0 0 10px #ff0044;
        cursor: pointer;
        transition: all 0.3s ease;">
        🖥️ Play Full Screen
      </button>
    </div>
  </div>

  <!-- 🧠 Tip -->
  <p id="fray-tip" style="display: none; text-align: center; font-size: 0.85em; margin-top: 10px; color: #ccc;">
    🔥 Dodge. Upgrade. Survive. Repeat.
  </p>
</div>

<!-- 🧠 Script for toggle + full screen -->
<script>
function toggleFrayFightGame() {
  const game = document.getElementById("fray-game-container");
  const tip = document.getElementById("fray-tip");
  game.style.display = game.style.display === "none" ? "block" : "none";
  tip.style.display = game.style.display;
}

// 🔲 Fullscreen function
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

<!-- 🔔 Announcement 4: The Crimson Eclipse -->
<div class="announcement-card">
  <h4>🌑 The Crimson Eclipse Approaches</h4>
  <p class="announcement-date">June 28, 2025</p>
  <p class="announcement-content">
    A rare celestial event is about to unfold. As the <strong>Crimson Eclipse</strong> rises, ancient magic stirs and long-forgotten beasts awaken.
    <br><br>⏳ <em>The skies shift in...</em>
  </p>

  <!-- 🕰️ Countdown Timer -->
  <div id="eclipse-countdown" style="
    font-family: 'Cinzel', serif;
    font-size: 1.3rem;
    color: crimson;
    text-align: center;
    text-shadow: 0 0 10px #ff5555;
    margin-top: 10px;">
    Loading timer...
  </div>

  <!-- 🔮 Hidden Button to Enter the Rift -->
  <div id="secret-eclipse-content" style="display: none; margin-top: 25px; text-align: center;">
    <h5 style="color: gold; font-family: 'Cinzel', serif;">✨ A Hidden Realm Has Awakened</h5>
    <a href="#" onclick="enterRift()" class="btn" style="
      padding: 10px 26px;
      background: linear-gradient(to right, #330033, #cc0000);
      color: white;
      font-weight: bold;
      text-decoration: none;
      border-radius: 30px;
      font-size: 1.05rem;
      font-family: 'Cinzel', serif;
      box-shadow: 0 0 14px #ff4d4d;
      transition: 0.3s ease;"
      onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 0 20px crimson';"
      onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 14px #ff4d4d';">
      🔮 Enter the Crimson Rift
    </a>
  </div>
</div>

<!-- 🌑 Fullscreen Fade Overlay -->
<div id="rift-overlay" style="
  display: none;
  position: fixed;
  top: 0; left: 0;
  width: 100vw; height: 100vh;
  background: black;
  opacity: 0;
  transition: opacity 2s ease;
  z-index: 9999;">
</div>

<!-- 🔊 Rift Open Sound -->
<audio id="riftSound" src="voice/Victory(chosic.com).mp3"></audio>

<script>function toggleHeroReveal() {
  const heroSection = document.getElementById("hero-reveal");
  const btn = document.getElementById("reveal-btn");

  if (heroSection.style.display === "none") {
    heroSection.style.display = "block";
    btn.innerText = "❌ Hide Hero";
  } else {
    heroSection.style.display = "none";
    btn.innerText = "🔍 Reveal Hero";
  }
}
  function toggleFrayFightGame() {
    const gameDiv = document.getElementById("fray-game-container");
    const tip = document.getElementById("fray-tip");
    const btn = document.getElementById("fray-toggle-btn");

    if (gameDiv.style.display === "none") {
      gameDiv.style.display = "block";
      tip.style.display = "block";
      btn.innerText = "❌ Hide Fray Fight";
    } else {
      gameDiv.style.display = "none";
      tip.style.display = "none";
      btn.innerText = "⚔️ Play Fray Fight";
    }
  }
  const eclipseDate = new Date("June 30, 2025 21:00:00").getTime(); // Update date/time

  const timer = setInterval(function () {
    const now = new Date().getTime();
    const distance = eclipseDate - now;

    if (distance < 0) {
      clearInterval(timer);
      document.getElementById("eclipse-countdown").innerHTML = "🌒 The Crimson Eclipse Has Begun...";
      document.getElementById("secret-eclipse-content").style.display = "block";
    } else {
      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById("eclipse-countdown").innerHTML =
        `🕰️ ${days}d ${hours}h ${minutes}m ${seconds}s`;
    }
  }, 1000);

  function enterRift() {
    const overlay = document.getElementById("rift-overlay");
    const sound = document.getElementById("riftSound");

    // Play whisper sound
    sound.play();

    // Show dark overlay
    overlay.style.display = "block";
    setTimeout(() => {
      overlay.style.opacity = 1;
    }, 10);

    // Redirect to rift.php after 3 seconds
    setTimeout(() => {
      window.location.href = "rift.php";
    }, 3000);
  }
</script>
  </div>
  <?php include ('footer.php') ?>

  <!-- Bootstrap & Animation Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const title = "Loop of Legends";
  document.getElementById("animated-title").textContent = title;

  const carousel = document.querySelector('#fantasyCarousel');
  const bsCarousel = new bootstrap.Carousel(carousel, {
    interval: 3000,
    ride: 'carousel'
  });
</script>



</body>
</html> 