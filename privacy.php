<?php include ('header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Privacy Policy | Loop of Legends</title>
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

    .privacy-container {
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
.privacy-container {
      padding: 60px 20px 30px; /* Top padding increased for navbar space */
    }

    .privacy-container h1,
    .privacy-container h2,
    .privacy-container p,
    .privacy-container ul {
      text-align: center;
    }

    .privacy-container ul {
      padding-left: 0;
      list-style-position: inside;
    }
  </style>
</head>
<body>

  <div class="privacy-container">
    <h1 class="text-center mb-4">🛡️ Privacy Policy</h1>
    <p class="text-center mb-5">Welcome, traveler. In this enchanted realm, your privacy is protected with the same care as ancient relics. Read on to understand how we guard your data like dragons guard treasure.</p>

    <h2>📜 What We Collect</h2>
    <p>We may gather the following magical details:</p>
    <ul>
      <li>Your name (as written on the enchanted scroll)</li>
      <li>Email address (for delivering messages by raven or spell)</li>
      <li>Your interactions within the realm (clicks, game choices, and battles fought)</li>
    </ul>

    <div class="section-divider"></div>

    <h2>🧙 How We Use It</h2>
    <p>Your data helps us:</p>
    <ul>
      <li>Enhance your journey across realms</li>
      <li>Send quest updates, episode scrolls, or dragon alerts</li>
      <li>Keep shadowy intruders away using magic-firewalls</li>
    </ul>

    <div class="section-divider"></div>

    <h2>🧩 Data Security</h2>
    <p>We’ve cast protective spells and used secure shields to ensure your information remains safe from curses, hackers, and dark forces.</p>

    <div class="section-divider"></div>

    <h2>🪄 Your Control</h2>
    <p>You may:
      <ul>
        <li>Request to view or delete your details from our magical archives</li>
        <li>Unsubscribe from scroll updates anytime (but why would you leave the adventure?)</li>
      </ul>
    </p>

    <div class="section-divider"></div>

    <h2>🧭 Changes to This Scroll</h2>
    <p>If the realm’s laws change, this policy shall be updated. You’ll be informed through magical alerts.</p>

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
