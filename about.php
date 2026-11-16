
<?php include ('header.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>📘 About Us- Loop of Legends</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
     body {
      background-color: #000;
      color: #fff;
      font-family: 'Cinzel', serif;
    }
    h2.section-heading {
  font-family: 'Cinzel', serif;
  font-weight: bold;
  font-size: clamp(1.8rem, 5vw, 2.8rem);
  text-align: center;
}
.map-container {
  position: relative;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}

.interactive-map {
  width: 100%;
  border: 3px solid crimson;
  border-radius: 15px;
  box-shadow: 0 0 10px crimson;
}

.map-point {
  position: absolute;
  width: 20px;
  height: 20px;
  background-color: crimson;
  border-radius: 50%;
  cursor: pointer;
  transform: translate(-50%, -50%);
  box-shadow: 0 0 10px crimson;
}

.map-point:hover::after {
  content: attr(title);
  position: absolute;
  top: -30px;
  left: 50%;
  transform: translateX(-50%);
  background-color: #111;
  padding: 6px 10px;
  border-radius: 6px;
  color: #fff;
  white-space: nowrap;
  font-size: 14px;
  box-shadow: 0 0 10px crimson;
}
.map-point {
  transition: transform 0.3s ease-in-out;
}
.map-point:hover {
  transform: scale(1.3);
}
.section-heading {
  font-family: 'Cinzel', serif;
  font-weight: bold;
  font-size: clamp(1.8rem, 4.5vw, 2.8rem);
  color: #ff2e2e;
  text-shadow: 1px 1px 8px black;
}

.map-point {
  position: absolute;
  width: 12px;
  height: 12px;
  background-color: crimson;
  border: 2px solid #fff;
  border-radius: 50%;
  cursor: pointer;
  animation: pulse 2s infinite;
  z-index: 10;
}

@keyframes pulse {
  0% { transform: scale(1); opacity: 0.8; }
  50% { transform: scale(1.5); opacity: 0.4; }
  100% { transform: scale(1); opacity: 0.8; }
}
/* Common hover animation */
.map-hover, .image-hover {
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  cursor: pointer;
}

.map-hover:hover, .image-hover:hover {
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(255, 0, 85, 0.6);
  z-index: 10;
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
.navbar {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
}

body {
  padding-top: 90px;
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
.quote-scroll {
  transition: transform 0.3s ease;
}
.quote-scroll:hover {
  transform: scale(1.02);
  box-shadow: 0 0 10px rgba(255, 0, 100, 0.3);
}

  </style>
</head>
<body>
<!-- ⚔️ About the Realms -->
<section id="about" class="info-section" style="background: linear-gradient(135deg, #080808ff, transparent); color: #fff; padding: 60px 0;">
  <div class="container">
    <div class="row align-items-center flex-column-reverse flex-md-row">

     <!-- 🌍 MAP ON LEFT -->
      <div class="col-md-6 mb-4 mb-md-0">
        <div class="map-container position-relative text-center">
          <img src="img/map2.jpeg" alt="Fantasy Map" class="img-fluid map-hover rounded shadow-lg">

          <!-- Map Points -->
          <div class="map-point" style="top: 10%; left: 18%;" title="❄ Kingdom of Glacia – Home of Silent Crystals"></div>
          <div class="map-point" style="top: 15%; left: 65%;" title="🔥 Kingdom of Ember – Land of Illusion-Fading Flames"></div>
          <div class="map-point" style="top: 50%; left: 20%;" title="🌲 Kingdom of Syliva – Forest of Forgotten Memories"></div>
          <div class="map-point" style="top: 80%; left: 78%;" title="🌪️ Kingdom of Zephyrus – Sky of Shifting Truths"></div>
          <div class="map-point" style="top: 40%; left: 50%;" title="🗡 Samurai's Shadows – shadows of feudal Japan"></div>        
          <div class="map-point" style="top: 70%; left: 50%;" title="🎯 Elven Rage – Fury of the elven warrior"></div>
        </div>
      </div>

      <!-- 📖 TEXT ON RIGHT -->
<div class="col-md-6 text-center text-md-start">
  <h2 class="section-heading dragon-red mb-4">🌌 About Loop Of Legends</h2>
  <p style="font-size: 1.25rem; line-height: 2;">
    <strong>Loop Of Legends</strong> is more than a website — it is a living realm of myth, illusion, and fate, where every step echoes through time.<br>
    Across the six enchanted kingdoms, the world unfolds like a forgotten prophecy. 
    In <strong style="color:#ff4d4d;">Ember</strong>, fire burns through lies. 
    <strong style="color:#00d4ff;">Glacia</strong> whispers truths hidden in ice. 
    <strong style="color:#00ff88;">Syliva</strong> weaves forest secrets through roots and soul.<br>
    High above, <strong style="color:#a0e7ff;">Zephyrus</strong> bends wind and illusion — a land where nothing stays the same. 
    In the distant east, the <strong style="color:#ffcc00;">Samurai's Domain</strong> guards sacred codes with steel and shadow.
    And within the untamed wilds of <strong style="color:#cc33ff;">Elven Rage</strong>, primal fury awakens ancient power.<br>
    Every choice you make, every realm you explore, twists the fate of this universe. Heroes rise, villains evolve, and time loops again… but differently.<br>
  </p>
</div>

     
    </div>
  </div>
</section>
<!-- 📜 Prophecies of the Realms -->
<section class="info-section" style="background: linear-gradient(135deg, #030303ff, transparent); color: #fff; padding: 60px 0;">
  <div class="container">
    
    <!-- Heading Left Aligned -->
    <div class="row">
      <div class="col-12">
        <h2 class="section-heading dragon-red fw-bold mb-5" style="font-size: 3.5rem; font-weight: 900;">
          📜 Prophecies of the Realms
        </h2>
      </div>
    </div>

    <!-- Quotes -->
    <div class="quote-scroll mt-4 p-4 rounded" style="background: rgba(255,255,255,0.05); border-left: 4px solid crimson;">
      <em>“Legends are not written by time — they are carved by choices.”</em><br/>
      <span style="color: #aaa;">— The First Oracle</span>
    </div>

    <div class="quote-scroll mt-4 p-4 rounded" style="background: rgba(255,255,255,0.05); border-left: 4px solid #ff4d4d;">
      <em>“When the flame forgets, illusion fades — and truth rises in ashes.”</em><br/>
      <span style="color: #aaa;">— Scroll of Ember</span>
    </div>

    <div class="quote-scroll mt-4 p-4 rounded" style="background: rgba(255,255,255,0.05); border-left: 4px solid #00d4ff;">
      <em>“In frozen silence, only the brave can hear destiny speak.”</em><br/>
      <span style="color: #aaa;">— Whispered in Glacia</span>
    </div>

    <div class="quote-scroll mt-4 p-4 rounded" style="background: rgba(255,255,255,0.05); border-left: 4px solid #00ff88;">
      <em>“The roots remember what the mind forgets — even in decay, they bloom.”</em><br/>
      <span style="color: #aaa;">— Syliva’s Last Grove</span>
    </div>
  </div>
</section>



<!-- 🌟 Why We’re Legendary -->
<section class="info-section" style="background-color: #060606ff; color: #eee; padding: 60px 0;">
  <div class="container">
    <div class="row align-items-center flex-column-reverse flex-md-row">

      <!-- 📜 Text Left -->
      <div class="col-md-7 text-center text-md-start">
        <h2 class="section-heading dragon-red mb-4">🔮 What Makes Us Legendary?</h2>
        <p style="font-size: 1.1rem; line-height: 1.75;">
          🌟 <strong>Chronicle-Driven Gameplay</strong> – Each <em>Scroll</em> unveils new legends, riddles, and trials woven into fate.<br/>
          🧙‍♂️ <strong>Living, Breathing Characters</strong> – Heroes evolve, betray, or rise — based on the choices you dare to make.<br/>
          🌍 <strong>Realm-Based Worldbuilding</strong> – From lava-forged illusions to frostbitten truths, each kingdom offers a new magical reality.<br/>
          ♾️ <strong>The Loop Never Ends</strong> – Legends never die. They return… altered, remembered, and reborn with a purpose.
        </p>
      </div>

      <!-- 🖼️ Image Right -->
      <div class="col-md-5 mb-4 mb-md-0">
        <img src="img/ChatGPT Image Jun 19, 2025, 02_09_25 AM.png" alt="Legends" class="img-fluid image-hover rounded shadow-lg">
      </div>
    </div>
  </div>
</section>


<!-- 🧝 Character Spotlight -->
<section class="info-section" style="background: linear-gradient(135deg, #070707ff, transparent); color: #fff; padding: 60px 0;">
  <div class="container">
    <h2 class="section-heading text-center mb-5">🧝 Meet the Legends</h2>
    <div class="row g-4 justify-content-center">
      
      <!-- 🔥 Arin -->
      <div class="col-md-4 d-flex flex-column align-items-center text-center">
        <img src="img/arin.jpg" class="img-fluid rounded-circle shadow image-hover mb-3" alt="Arin the Emberblade" style="max-width: 150px;">
        <h4 class="dragon-red">🔥 Arin the Emberblade</h4>
        <p>Born from lies, risen through fire. Seeker of lost truth.</p>
      </div>


      <!-- 🌪 Zeph -->
      <div class="col-md-4 d-flex flex-column align-items-center text-center">
        <img src="img/Zephy.jpg" class="img-fluid rounded-circle shadow image-hover mb-3" alt="Zeph the Whisperwind" style="max-width: 150px;">
        <h4 class="dragon-red">🌪 Zeph the Whisperwind</h4>
        <p>Master of illusions and the unseen path of fate.</p>
      </div>


      <!-- ❄ Lira -->
      <div class="col-md-4 d-flex flex-column align-items-center text-center">
        <img src="img/lira.jpg" class="img-fluid rounded-circle shadow image-hover mb-3" alt="Lira of Glacia" style="max-width: 150px;">
        <h4 class="dragon-red">❄ Lira of Glacia</h4>
        <p>She hears what the ice remembers — and speaks to the past.</p>
      </div>
    </div>
  </div>
  </div> <!-- row -->
  
  <!-- Magical Button -->
          <div class="text-center mt-4">
            <a href="characters.php" class="view-the-characters-btn" style="
            padding: 10px 26px;
            background: linear-gradient(to right, #800000, #ff0000);
            color: white;
            font-weight: bold;
            text-decoration: none;
            border-radius: 30px;
            font-size: 1.05rem;
            box-shadow: 0 0 12px #ff3b3b99;
            transition: all 0.3s ease;
            " onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 0 18px #ff5555';"
            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 12px #ff3b3b99';">
           🧙‍♂️ Explore All Legends
            </a>
          </div>

</div> <!-- container -->

</section>


<!-- 👥 Our Team -->
<section class="info-section" style="background: linear-gradient(135deg, #060606ff, transparent); color: #fff; padding: 60px 0;">
  <div class="container">
    <h2 class="section-heading text-center mb-3">👥 Our Team</h2>
    <p class="text-center mb-5" style="color: #aaa; font-size: 1.1rem;">
      Meet the minds forging the Loop of Legends behind the scenes.
    </p>

    <div class="row g-5 justify-content-center text-center">

      <!-- 💅 Team Card Styles -->
      <style>
        .team-card {
          background: #111;
          border-radius: 20px;
          padding: 30px 20px;
          border: 2px solid transparent;
          transition: 0.3s ease;
          box-shadow: 0 0 20px transparent;
          width: 100%;
          max-width: 280px;
        }

        .team-card:hover {
          border-image: linear-gradient(45deg, #ff0000ff, #4e0606f0) 1;
          box-shadow: 0 0 25px rgba(255, 0, 0, 0.3);
          transform: translateY(-6px);
        }

        .team-card img {
          display: block;
          margin: 0 auto;
          border-radius: 50%;
          border: 2px solid #444;
          transition: 0.3s;
        }

        .team-card:hover img {
          border-color: #ff0000ff;
          box-shadow: 0 0 10px rgba(255, 64, 100, 0.5);
        }

        .team-card h5,
        .team-card p {
          margin: 0;
        }

        .dragon-red {
          color: #ff0040;
        }
      </style>

      <!-- Member 1 -->
      <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
        <div class="team-card">
          <img src="img/Lyra Stormveil.jpg" alt="Lyra Stormveil" class="img-fluid mb-3" style="max-width: 130px;">
          <h5 class="dragon-red mb-1">🌩️ Lyra Stormveil</h5>
          <p style="color: #ccc; font-size: 0.9rem;">Arcane Interface Alchemist</p>
        </div>
      </div>

      <!-- Member 2 -->
      <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
        <div class="team-card">
          <img src="img/Kael Drakestone.jpg" alt="Kael Drakestone" class="img-fluid mb-3" style="max-width: 130px;">
          <h5 class="dragon-red mb-1">⚙️ Kael Drakestone</h5>
          <p style="color: #ccc; font-size: 0.9rem;">Core Logic Blacksmith</p>
        </div>
      </div>

      <!-- Member 3 -->
      <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
        <div class="team-card">
          <img src="img/Talon Ashbane.jpg" alt="Talon Ashbane" class="img-fluid mb-3" style="max-width: 130px;">
          <h5 class="dragon-red mb-1">🔥 Talon Ashbane</h5>
          <p style="color: #ccc; font-size: 0.9rem;">Visual Effects Enchanter</p>
        </div>
      </div>

      <!-- Member 4 -->
      <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
        <div class="team-card">
          <img src="img/Zira Voltthorn.jpg" alt="Zira Voltthorn" class="img-fluid mb-3" style="max-width: 130px;">
          <h5 class="dragon-red mb-1">⚡ Zira Voltthorn</h5>
          <p style="color: #ccc; font-size: 0.9rem;">Performance Sorceress</p>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- 🧭 Floating Compass Navigation -->
<a href="#about" class="btn btn-danger position-fixed bottom-0 end-0 m-4 shadow-dragon" title="Back to Lore" style="border-radius: 50px; font-size: 1.5rem; z-index: 1050;">
  🧭
</a>


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

