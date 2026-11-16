<?php include ('header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>📚 Episodes- Loop of Legends</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
  html, body {
  height: 100%;
  margin: 0;
  background: linear-gradient(to bottom, #0e0e1a, #1c1c38); /* Dark fantasy feel */
  color: #ffffff;
  font-family: 'Cinzel', serif;
}

  h1.title {
      font-size: 3rem;
      margin-bottom: 25px;
      color: #ff2e2e;
      text-shadow: 2px 2px 10px #000;
      font-weight: 700;
      text-align: center;
    }

    #episodes {
      padding: 40px 15px 100px;
    }

    .book-container {
      position: relative;
      width: 100%;
      max-width: 850px;
      background: #1a1a2f;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 0 25px rgba(255, 0, 0, 0.2);
      margin: auto;
      overflow: hidden;
    }

    .page {
      display: none;
      width: 100%;
      padding: 25px;
      background-size: cover;
      background-position: center;
      border-radius: 10px;
      position: relative;
      color: white;
      text-shadow: 1px 1px 3px #000;
      animation: fadeIn 0.8s ease-in-out;
    }

    .page.active {
      display: block;
      z-index: 1;
    }

    .page h2 {
      font-size: 1.8rem;
      color: #ffd369;
      margin-top: 0;
    }

    .page-content {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 25px;
      border-radius: 8px;
      padding-bottom: 100px; /* So buttons don't hide text */
    }

    .controls {
      position: absolute;
      bottom: 20px;
      left: 0;
      right: 0;
      display: flex;
      justify-content: space-between;
      padding: 0 30px;
      z-index: 2;
    }

    button {
      background: rgba(215, 0, 0, 0.85);
      border: none;
      color: white;
      padding: 12px 25px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1rem;
      font-weight: bold;
      transition: 0.3s ease;
      backdrop-filter: blur(5px);
    }

    button:hover {
      background: #ff3030;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 768px) {
      h1.title {
        font-size: 2rem;
      }

      .page h2 {
        font-size: 1.4rem;
      }

      .page p {
        font-size: 1rem;
      }

      .controls {
        padding: 0 20px;
        gap: 10px;
        bottom: 15px;
      }

      button {
        padding: 10px 20px;
        font-size: 0.9rem;
      }

      .page-content {
        padding: 15px;
        padding-bottom: 110px;
      }
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
.footer-logo {
  width: 50px; /* ya apne hisaab se */
  height: auto;
  transition: transform 0.3s ease, filter 0.3s ease;
  border: none;
  outline: none;
  border-radius: 0;
  background: none;
  padding: 0;
}

.footer-logo:hover {
  transform: scale(1.1);
  filter: drop-shadow(0 0 10px rgba(220, 20, 60, 0.6)); /* 🔴 Crimson glow */
}



/* ✅ Fix Images on Mobile */
img, iframe, video {
  max-width: 100%;
  height: auto;
  display: block;
}

/* ✅ Responsive Hero Image */
.slider-img {
  height: 50vh;
}

@media (max-width: 768px) {
  .slider-img {
    height: 250px;
  }

  #animated-title,
  .enchanted-caption h2,
  .info-section h2,
  .typewriter-heading {
    font-size: 1.4rem !important;
    white-space: normal !important;
    border-right: none !important;
    animation: none !important;
    overflow: visible !important;
  }

  .enchanted-caption p,
  .info-section p {
    font-size: 1rem !important;
  }

  .gallery-card img {
    height: 180px;
  }

  .logo-title {
    flex-direction: column;
    gap: 8px;
  }

  .nav-logo-right {
    margin-left: 0;
  }

  .hero-section {
    padding: 70px 15px 30px;
    margin-top: 70px;
  }

  .read-more-btn {
    font-size: 1rem;
    padding: 10px 20px;
  }

  .gallery-heading {
    font-size: 1.8rem;
  }
}
</style>
</head>
<body>

<!-- 📚 The Realms -->
<section id="episodes">
  <h1 class="title text-center" style="color: #ff2e2e; font-family: 'Cinzel', serif; font-size: clamp(1.8rem, 4vw, 2.8rem); text-shadow: 1px 1px 4px black;">
    📚 The Realms
  </h1>

  <div class="book-container container">
    
  <!-- Page 1 -->
<div id="page1" class="page active" style="background-image: url('img/Reblog by @shadowandbone · 3 images.gif');">
  <div class="page-content">
    <h2>📖 Loop of Legends</h2>
    <p>
      Ages ago, the world was united under a celestial harmony. But when the <strong>Shadow</strong> rose, it shattered the Realms into six elemental kingdoms:<br><br>

      🔥 <strong>Kingdom of Ember</strong> — forged in flame, where truth burns illusions.<br>
      ❄️ <strong>Kingdom of Glacia</strong> — a frozen empire echoing ancient whispers.<br>
      🌿 <strong>Kingdom of Syliva</strong> — a mystical forest where memories grow like roots.<br>
      🗡️ <strong>Samurai’s Shadow</strong> — a cursed province veiled in blood, honor, and illusion.<br>
      🎯 <strong>Elven Rage</strong> — the hidden dominion of wild magic and vengeance-fueled rebellion.<br>
      🌪️ <strong>Kingdom of Zephyrus</strong> — storm-ridden skies where nothing is as it seems.<br><br>

      Now, six heroes rise from each realm. Bound by fate. Chosen to end the illusion... or be consumed by it.<br><br>

      This isn’t just a tale of kingdoms — <span style="color: crimson; font-weight: bold;">this is the Loop of Legends</span>.
    </p>
  </div>
</div>

    <!-- Page 2 -->
    <div id="page2" class="page" style="background-image: url('img/emberi.gif');">
      <div class="page-content">
        <h2>🔥 Episode 1: Rise of Ember</h2>
        <p>
          As flames danced in the sky, <strong>Adalia Ember</strong> awoke from a vision unlike any other—an illusion so real it bled.<br><br>
          She must master the fire that burns falsehood, journey through volcanic valleys, and discover her fate as the <strong>Flame-Wielder of Truth</strong>.
        </p>
      </div>
    </div>

    <!-- Page 3 -->
    <div id="page3" class="page" style="background-image: url('img/glacia.gif');">
      <div class="page-content">
        <h2>❄️ Episode 2: Echoes of the Realms</h2>
        <p>
          In the frost-covered ruins of Glacia, <strong>Wyllan</strong> hears whispers buried beneath the ice. Not voices of the past, but echoes of a lie repeated too long.<br><br>
          He uncovers clues to the Shadow’s earliest manipulations—traced in shattered mirrors and frozen screams.
        </p>
      </div>
    </div>

    <!-- Page 4 -->
    <div id="page4" class="page" style="background-image: url('img/dragoni.gif');">
      <div class="page-content">
        <h2>🌿 Episode 3: Mirror of Syliva</h2>
        <p>
          In the forest of Syliva, <strong>Falencia</strong> finds the Mirror of Forgotten Roots—an artifact said to reflect one’s soul and their secrets.<br><br>
          With each reflection, painful memories return. She must face the lies she believed were true.
        </p>
      </div>
    </div>

  <!-- Page 5 -->
    <div id="page5" class="page" style="background-image: url('img/shadowdrag.gif');">
      <div class="page-content">
        <h2>🌪️ Episode 5: The Zephyrus Encounter</h2>
        <p>
          As storms crack open time, <strong>Vethis Zephyrus</strong> walks into Umbra—the cursed kingdom of illusion.<br><br>
          Nothing is real. Everything deceives. The truth isn’t a weapon... but a choice. Will you choose light—or the <strong>Shadow Within</strong>?
        </p>
      </div>
    </div>

    <!-- Page 6 -->
<div id="page6" class="page" style="background-image: url('img/shadow.gif');">
  <div class="page-content">
    <h2>🗡️ Episode 6: Samurai’s Shadow</h2>
    <p>
      In a realm where honor is currency, <strong>Raikuro</strong>, the last of the Scarlet Blades, walks alone.<br><br>
      Cursed by a forgotten warlord, his shadow now moves with a will of its own. To reclaim his soul, Raikuro must face betrayal, break ancient seals, and slay the phantom within.<br><br>
      Only one truth remains: your greatest enemy lies within.
    </p>
  </div>
</div>

<!-- Page 7 -->
<div id="page7" class="page" style="background-image: url('img/cenematic.gif');">
  <div class="page-content">
    <h2>🧝 Episode 7: Elven Rage</h2>
    <p>
      After centuries of peace, the Elven Queen <strong>Ayelara</strong> awakens a forbidden power buried deep beneath the Sylvan roots.<br><br>
      Consumed by rage and vengeance, she declares war on all who corrupted the land.<br><br>
      Will her fury heal the forest—or burn it all to ash?
    </p>
  </div>
</div>
<?php
include('db.php');

// Fetch episodes from DB ordered by latest
$epResult = $conn->query("SELECT * FROM episodes ORDER BY created_at ASC");

$dynamicPage = 8; // Because page1-7 are static
if ($epResult && $epResult->num_rows > 0):
  while ($row = $epResult->fetch_assoc()):
    $epTitle = htmlspecialchars($row['title']);
    $epDesc = nl2br(htmlspecialchars($row['description']));
    $bgImage = htmlspecialchars($row['bg_image']); // 👈 custom background path from DB
?>
<div id="page<?= $dynamicPage ?>" class="page" style="background-image: url('<?= $bgImage ?>');">
  <div class="page-content">
    <h2>📜 <?= $epTitle ?></h2>
    <p><?= $epDesc ?></p>
  </div>
</div>
<?php
  $dynamicPage++;
  endwhile;
endif;

// Pass final page count to JS
echo "<script>const total = " . ($dynamicPage - 1) . ";</script>";
?>

    <!-- Controls -->
<div class="controls text-center" style="margin-top: 120px;">
  <button id="prevBtn" class="btn mx-2 shadow-lg" onclick="prevPage()" style="
    background-color: transparent;
    color: crimson;
    border: 2px solid crimson;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 30px;
    transition: all 0.3s ease;
  " onmouseover="this.style.backgroundColor='crimson'; this.style.color='white';" 
     onmouseout="this.style.backgroundColor='transparent'; this.style.color='crimson';">
    ⬅ Prev
  </button>

  <button id="nextBtn" class="btn mx-2 shadow-lg" onclick="nextPage()" style="
    background-color: transparent;
    color: crimson;
    border: 2px solid crimson;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 30px;
    transition: all 0.3s ease;
  " onmouseover="this.style.backgroundColor='crimson'; this.style.color='white';" 
     onmouseout="this.style.backgroundColor='transparent'; this.style.color='crimson';">
    Next ➡
  </button>
</div>

  </div>
</section>

<script>
  let current = 1;

  function showPage(n) {
    const pages = document.querySelectorAll('.page');
    const total = pages.length;

    pages.forEach((page, index) => {
      page.classList.remove('active');
      if (index === n - 1) {
        page.classList.add('active');
      }
    });

    // Disable buttons if at start or end
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    if (prevBtn && nextBtn) {
      prevBtn.disabled = (n === 1);
      nextBtn.disabled = (n === total);
    }
  }

  function nextPage() {
    const total = document.querySelectorAll('.page').length;
    if (current < total) {
      current++;
      showPage(current);
    }
  }

  function prevPage() {
    if (current > 1) {
      current--;
      showPage(current);
    }
  }

  window.onload = () => {
    current = 1;
    showPage(current);
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };
</script>
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


