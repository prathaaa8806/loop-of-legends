<?php include ('header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Terms & Conditions | Loop of Legends</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: radial-gradient(circle, #0b000b, #000);
      color: white;
      font-family: 'Cinzel', serif;
      padding: 30px;
    }
    

    .hero-section {
      text-align: center;
      padding: 100px 20px 30px;
    }

    .logo {
      width: 180px;
      animation: zoomIn 2s ease-in-out;
    }

    @keyframes zoomIn {
      from { transform: scale(0.3); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }

    .terms-container {
      max-width: 900px;
      margin: auto;
      padding: 30px;
      background-color: rgba(255, 255, 255, 0.05);
      border: 2px solid crimson;
      border-radius: 20px;
      box-shadow: 0 0 20px crimson;

      /* Animation */
      opacity: 0;
      transform: translateY(40px);
      animation: fadeSlideIn 1s ease-out forwards;
    }

    h1, h2 {
      color: #ff4d4d;
      text-shadow: 1px 1px 5px black;
    }

    p {
      opacity: 0.9;
    }

    .section-divider {
      border-top: 1px dashed crimson;
      margin: 25px 0;
    }

    @keyframes fadeSlideIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    a.back-link {
      color: crimson;
      text-decoration: none;
      display: inline-block;
      margin-top: 30px;
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
/* 📱 TERMS Mobile Optimization */
    .terms-container {
      padding: 60px 20px 30px;
    }

    .terms-container h1,
    .terms-container h2,
    .terms-container p {
      text-align: center;
    }

    .terms-container ul {
      padding-left: 0;
      list-style-position: inside;
    }

    .terms-container .back-link {
      font-size: 1rem;
      padding: 10px 20px;
    }
  }
  </style>
  
</head>
<body>

  <div class="terms-container">
    <h1 class="text-center mb-4">📜 Terms & Conditions</h1>
    <p class="text-center mb-5">By entering the Loop of Legends, you agree to abide by the sacred laws of the realms. Below lies the scroll of terms that binds all heroes and villains alike.</p>

    <h2>🎮 Usage Rules</h2>
    <p>When navigating this magical realm, you agree not to misuse the site, cheat in games, or attempt to hack into the sacred source code.</p>

    <div class="section-divider"></div>

    <h2>🧙 Ownership & Rights</h2>
    <p>All artwork, stories, realms, and characters are protected under ancient copyright spells. Do not claim them as your own unless granted the Mark of Permission.</p>

    <div class="section-divider"></div>

    <h2>⚔️ Fair Play</h2>
    <p>Users must not harass other travelers, spam the scrolls, or exploit magical bugs for personal gain.</p>

    <div class="section-divider"></div>

    <h2>🛡️ Limited Liability</h2>
    <p>While we ensure the realm is guarded from evil, we are not responsible for dragon attacks, curse errors, or dimension lags caused by external forces.</p>

    <div class="section-divider"></div>

    <h2>🧭 Scroll Updates</h2>
    <p>The scroll may be rewritten as the kingdom evolves. Changes will be reflected on this page. Your continued journey means acceptance of the updated terms.</p>

    <p class="mt-4 text-end" style="font-size: 0.9rem; opacity: 0.6;">Last updated: June 21, 2025</p>

    <!-- Magical Button -->
          <div class="text-center mt-4">
            <a href="index.php" class="back-link" style="
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
            ⬅️ Return to Home
            </a>
          </div>
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
