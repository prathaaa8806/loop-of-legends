<?php 
include ('header.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>🏠 Home- Loop of Legends</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    
    body {
      background-color: #000;
      color: #fff;
      font-family: 'Cinzel', serif;
    }
    
    .logo-title {
  display: flex;
  align-items: center;
  gap: 15px;
  justify-content: center;
  margin-top: 20px;
}

.dragon-logo {
  height: 50px;
  width: 50px;
  object-fit: contain;
}

.site-title {
  font-family: 'Cinzel', serif;
  font-size: 2rem;
  color: crimson;
  animation: flicker 2s infinite alternate;
}

@keyframes flicker {
  0% { opacity: 1; text-shadow: 0 0 5px red; }
  50% { opacity: 0.8; text-shadow: 0 0 10px crimson; }
  100% { opacity: 1; text-shadow: 0 0 20px darkred; }
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

    #animated-title {
      display: inline-block;
      font-size: 36px;
      color: crimson;
      text-shadow: 2px 2px 10px rgba(255, 0, 0, 0.5);
      white-space: nowrap;
      overflow: hidden;
      border-right: 2px solid crimson;
      animation: wordTyping 5s steps(14) forwards, blink 0.8s step-end infinite;
    }

    @keyframes wordTyping {
      0% { width: 0; }
      7% { width: 4ch; }
      14% { width: 5ch; }
      21% { width: 8ch; }
      35% { width: 9ch; }
      50% { width: 11ch; }
      70% { width: 13ch; }
      100% { width: 15ch; }
    }

    @keyframes blink {
      50% { border-color: transparent; }
    }

  .slider-img {
  height: 60vh; /* or use media query below */
  background-size: cover;
  background-position: center;
  position: relative;
  filter: brightness(0.8) contrast(1.1);
  border: 2px solid crimson;
  box-shadow: 0 0 20px crimson;
  transition: all 0.5s ease-in-out;
  object-fit: cover;
  border-radius: 10px;
  width: 100%;
}


.carousel-caption h5 {
  color: #D90429; /* Dragon Red */
  font-weight: bold;
  font-size: 1.8rem;
  text-shadow: 2px 2px 4px #000;
}


.enchanted-caption h2 {
  font-size: 2rem;
  font-weight: bold;
  color: #ff4c4c;
  text-shadow: 2px 2px 8px #000;
  animation: revealWords 2s steps(25, end);
  white-space: nowrap;
  overflow: hidden;
  border-right: 2px solid crimson;
}

.enchanted-caption p {
  color: #f8f8f8;
  font-size: 1.1rem;
  margin-top: 10px;
  text-shadow: 1px 1px 5px #000;
}

@keyframes revealWords {
  from { width: 0; }
  to { width: 100%; }
}

@media (max-width: 576px) {
    .unleash-btn {
      font-size: 0.95rem !important;
      padding: 8px 20px !important;
    }
    .carousel-caption h5 {
      font-size: 1.2rem;
    }
    .carousel-caption p {
      font-size: 0.9rem;
    }
  }
    .kingdom-title {
      position: absolute;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      color: crimson;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 8px 20px;
      border-radius: 10px;
      font-size: 24px;
      font-weight: bold;
      z-index: 10;
      text-shadow: 0 0 10px black;
    }

    .info-section {
      background-color: #111;
      padding: 50px 20px;
      text-align: center;
    }

    .info-section h2 {
      color: crimson;
      margin-bottom: 20px;
    }

    .info-section h2 {
      color: crimson;
      margin-bottom: 20px;
      display: inline-block;
      white-space: nowrap;
      overflow: hidden;
      border-right: 2px solid crimson;
      animation: wordTypingH2 4s steps(25) forwards, blink 0.8s step-end infinite;
    }

    @keyframes wordTypingH2 {
      from { width: 0; }
      to { width: 28ch; }
    }

    .info-section p {
      font-size: 18px;
      color: #ccc;
    }
    .kingdom-cards {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 40px;
    }

    .kingdom-card {
      background-color: #222;
      border: 2px solid crimson;
      border-radius: 10px;
      overflow: hidden;
      width: 250px;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .kingdom-card:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px crimson;
    }

    .kingdom-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }

    .kingdom-card p {
      padding: 10px;
      font-size: 14px;
      color: #eee;
    }
    .image-card img {
      width: 100%;
      height: auto;
      display: block;
      transition: transform 0.4s ease;
      border-radius: 20px;
    }

    .image-card:hover img {
      transform: scale(1.05);
      cursor: pointer;
    }
    .parallax-about {
  background-image: url('https://i.ibb.co/kx5J43B/parallax-bg.jpg');
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  padding: 100px 20px;
  position: relative;
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
  .dragon-red {
    color: crimson;
  }
  .section-padding {
    padding: 60px 20px;
  }
  .learn-card {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    border-radius: 15px;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }
  .learn-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(220, 20, 60, 0.6); /* crimson glow */
    background-color: #1a1a2e;
    color: #fff;
  }

  .learn-card:hover .card-title {
    color: crimson;
  }

  .card-body {
    padding: 30px;
  }

  .card-title {
    font-size: 1.25rem;
    margin-bottom: 15px;
    transition: color 0.3s ease;
  }

  .card-text {
    font-size: 1rem;
    color: #ccc;
}

 .typewriter {
  display: inline-block;
  overflow: hidden;
  border-right: 3px solid #ff5555; /* Cursor effect */
  white-space: nowrap;
  animation: typing 3s steps(30, end), blink 0.6s step-end infinite;
  font-weight: bold;
}

@keyframes typing {
  from { width: 0; }
  to { width: 100%; }
}

@keyframes blink {
  50% { border-color: transparent; }
}

.read-more-btn {
  display: inline-block;
  padding: 12px 30px;
  font-size: 1.1rem;
  color: #fff;
  border: 2px solid crimson;
  border-radius: 40px;
  text-decoration: none;
  position: relative;
  overflow: hidden;
  background: transparent;
  transition: all 0.4s ease-in-out;
  box-shadow: 0 0 12px rgba(255, 0, 60, 0.5);
  font-weight: bold;
  letter-spacing: 1px;
}

.read-more-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: crimson;
  transition: all 0.4s ease-in-out;
  z-index: -1;
}

.read-more-btn:hover {
  color: #fff;
  box-shadow: 0 0 20px crimson, 0 0 30px crimson;
}

.read-more-btn:hover::before {
  left: 0;
}

.kingdom-card img {
    width: 240px;
    height: 160px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .kingdom-card img:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(255, 0, 60, 0.5);
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
.gallery-heading {
      text-align: center;
      padding: 60px 20px 20px;
      font-size: 2.5rem;
      font-weight: bold;
      color: crimson;
      text-shadow: 0 0 10px black;
    }

    .gallery-row {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
      padding: 40px 20px;
    }

    .gallery-card {
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(255, 0, 80, 0.4);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .gallery-card:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px rgba(255, 0, 80, 0.7);
    }

    .gallery-card img {
      display: block;
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 12px;
    }

    .caption {
      text-align: center;
      margin-top: 10px;
      font-weight: 500;
    }

  /* INPUT STYLING */
.contact-input {
  background: rgba(255, 255, 255, 0.07);
  border: 2px solid #ff2e2e;
  color: white;
  border-radius: 12px;
  font-size: 1rem;
}

.contact-input:focus {
  background-color: rgba(255, 255, 255, 0.1);
  outline: none;
  box-shadow: 0 0 15px #ff2e2e;
  border-color: #ff5555;
  color: #fff;
}

/* LABEL STYLING */
.form-floating label {
  color: #ccc;
}

/* BUTTON STYLING */
.contact-btn {
  background: linear-gradient(to right, #ff2e2e, #ff5e5e);
  color: #fff;
  font-weight: bold;
  padding: 12px 35px;
  border-radius: 50px;
  font-size: 1.1rem;
  border: none;
  transition: 0.3s ease-in-out;
  position: relative;
  overflow: hidden;
}

.contact-btn:hover {
  background: linear-gradient(to right, #ff4444, #ff2e2e);
  box-shadow: 0 0 20px crimson, 0 0 40px crimson;
  transform: scale(1.05);
}

.typewriter-heading {
  font-size: 2.3rem;
  font-weight: bold;
  text-shadow: 2px 2px 8px #ff2e2e;
  font-family: 'Cinzel', serif;
  white-space: nowrap;
  overflow: hidden;
  border-right: 2px solid #ff2e2e;
  width: fit-content;
  margin: auto;
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


/* ✅ Universal Fix */
* {
  box-sizing: border-box;
}

html, body {
  margin: 0;
  padding: 0;
  overflow-x: hidden;
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
.hero-section {
      background-image: url('img/banner.jpg'); /* ✅ change if needed */
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      text-align: center;
      padding: 60px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
    }
    .pop-logo {
      width: 140px;
      border-radius: 50%;
      box-shadow: 0 0 20px crimson;
      border: 3px solid crimson;
      animation: popUp 1s ease-out forwards;
      transform: scale(0);
    }
    .animated-title {
      font-size: 3rem;
      font-weight: bold;
      background: linear-gradient(to right, crimson, orange, #ffcc00);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: glow 2s ease-in-out infinite alternate;
    }
    .subtitle-text {
      font-size: 1.2rem;
      margin-top: 1rem;
      color: #f0f0f0;
    }
    @keyframes glow {
      0% { text-shadow: 0 0 8px crimson; }
      100% { text-shadow: 0 0 18px #ff9900, 0 0 24px crimson; }
    }
    @keyframes popUp {
      0% { transform: scale(0.2); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }
    .form-control::placeholder {
      color: #bbb;
    }
    .form-control:focus {
      border-color: #ff4d4d;
      box-shadow: 0 0 10px #ff4d4d;
      background-color: #2b0d2b;
      color: white;
    }
    html {
      scroll-behavior: smooth;
    }
    .review-card {
  animation: fadeIn 1s ease-in-out;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.magic-admin-btn:hover {
  background: linear-gradient(135deg, gold, #ffcc00);
  color: #111;
  border-color: crimson;
  box-shadow: 0 0 20px gold, 0 0 30px crimson;
  transform: scale(1.08);
  text-shadow: none;
}
/* 👇 Adjust for fixed navbar height */
#heroAfterLogin {
 margin-top: 70px; /* match your navbar height */
}
.kingdom-card {
  background-color: #222;
  border: 2px solid crimson;
  border-radius: 10px;
  overflow: hidden;
  width: 250px;
  transition: transform 0.3s, box-shadow 0.3s;
}

.kingdom-card:hover {
  transform: scale(1.05);
  box-shadow: 0 0 15px crimson;
}

.kingdom-card img {
  width: 100%;
  height: 150px;
  object-fit: cover;
  border-radius: 8px;
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.kingdom-card img:hover {
  transform: scale(1.05);
  box-shadow: 0 0 15px rgba(255, 0, 60, 0.5);
}

.typewriter-heading {
  overflow: hidden;
  white-space: nowrap;
  border-right: 3px solid crimson;
  animation: typing 4s steps(30, end), blink 0.75s step-end infinite;
  font-weight: bold;
  color: crimson;
  font-size: 2.2rem;
  text-align: center;
  font-family: 'Cinzel', serif;
}

@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

@keyframes blink {
  50% { border-color: transparent }
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
<body>

<!-- 🌟 Hero Section -->
<section id="heroAfterLogin"
  class="vh-100 d-flex flex-column justify-content-center align-items-center text-center"
  style="background: url('img/bg6.JPG') center/cover no-repeat; position: relative; margin-top: -70px;">

  <!-- 🔮 Dark Overlay -->
  <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.6); z-index: 1;"></div>

  <!-- 🌫️ Magical Fog Layer -->
  <div class="magic-overlay"></div>

  <!-- 🔰 Content -->
<div class="d-flex flex-column justify-content-center align-items-center w-100 px-3"
     style="position: relative; z-index: 2; padding-top: 120px;">

     <h1 class="intro-quote mb-3 dragon-shine">“In this RPG world, your choices craft the legend you become...”</h1>
     <style>.dragon-shine {
  font-size: 2rem;
  font-weight: bold;
  color: #ff1e1e; /* Dragon red */
  text-shadow: 0 0 10px #ff1e1e, 0 0 20px #ff4d4d, 0 0 30px #ff6666;
  animation: shineGlow 2s ease-in-out infinite alternate;
  font-family: 'Cinzel', serif; /* Optional: use a fantasy font */
}

@keyframes shineGlow {
  0% {
    text-shadow: 0 0 10px #ff1e1e, 0 0 20px #ff4d4d, 0 0 30px #ff6666;
  }
  100% {
    text-shadow: 0 0 20px #ff4d4d, 0 0 30px #ff8080, 0 0 40px #ff9999;
  }
}

</style>

    <!-- 🌀 Glowing Center Logo with POP -->
<div class="logo-circle animate-pop mb-4">
  <img src="img/mainlogo.png" alt="Loop of Legends Logo"
    class="hover"
    style="width: 150px; height: 150px;">
</div>
<style>.logo-circle img.hover {
  transition: transform 0.3s ease, filter 0.3s ease;
  border: none;
  outline: none;
  border-radius: 0;
}

.logo-circle img.hover:hover {
  transform: scale(1.1);
  filter: drop-shadow(0 0 10px rgba(255, 0, 0, 0.7)); /* 🔥 Red glow effect */
}
</style>
    <!-- ✨ ENHANCED Title -->
    <h3 class="enhanced-title mb-3">
      <span class="title-word">Loop</span>
      <span class="title-word">Of</span>
      <span class="title-word">Legends</span>
    </h3>

    <!-- 🧙‍♂️ Intro Quote -->
    <p class="intro-quote mb-3">“Where realms twist and time breaks, heroes rise...”</p>
<!-- 🌀 Glowing Logo Row -->
<section id="hero">
  <div class="d-flex justify-content-center gap-4 flex-wrap">
    <div class="logo-circle animate-pop mb-4">
      <img src="img/fire.jpg" alt="Logo 1"
        class="rounded-circle hover-glow-logo play-audio-video"
        data-audio="voice/11L-fire_in_war_field.mp3"
        data-video="https://www.youtube.com/embed/_U8TncLXi3A"
        style="width: 70px; height: 70px; border: 5px solid gold;">
    </div>

    <div class="logo-circle animate-pop mb-4">
      <img src="img/ice.jpg" alt="Logo 2"
        class="rounded-circle hover-glow-logo play-audio-video"
        data-audio="voice/11L-snow_fall.mp3"
        data-video="https://www.youtube.com/embed/y3M5SMOylV4"
        style="width: 70px; height: 70px; border: 5px solid gold;">
    </div>

    <div class="logo-circle animate-pop mb-4">
      <img src="img/leaf1.jpg" alt="Logo 3"
        class="rounded-circle hover-glow-logo play-audio-video"
        data-audio="voice/11L-nature_sound_birds.mp3"
        data-video="https://www.youtube.com/embed/MFLVmAE4cqg"
        style="width: 70px; height: 70px; border: 5px solid gold;">
    </div>

    <div class="logo-circle animate-pop mb-4">
      <img src="img/sword.jpg" alt="Logo 4"
        class="rounded-circle hover-glow-logo play-audio-video"
        data-audio="voice/sword-battle-jingle-loop-96983.mp3"
        data-video="https://www.youtube.com/embed/n1EhS16jY0I"
        style="width: 70px; height: 70px; border: 5px solid gold;">
    </div>
  </div>
</section>

<!-- 🎥 YouTube Video Modal with Golden Frame -->
<div id="videoModal" style="
  display: none;
  position: fixed;
  top: 70px;
  left: 20px;
  background: linear-gradient(to right, #a00000, #360404ff);
  padding: 16px;
  border-radius: 14px;
  z-index: 9999;
  text-align: center;
  max-width: 90%;
  border: 5px solid gold;
  box-shadow: 0 0 20px gold;">
  
  <div style="position: relative; width: 100%; max-width: 600px; aspect-ratio: 16/9; margin: auto;">
    <iframe id="videoFrame" width="100%" height="100%" frameborder="0" allowfullscreen
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
  </div>

  <button onclick="closeVideo()" class="magic-button">Close</button>
</div>

<!-- 💅 Button Styles -->
<style>
.magic-button {
  margin-top: 12px;
  padding: 10px 24px;
  font-size: 16px;
  color: #fff;
  background: linear-gradient(45deg, crimson, darkred);
  border: 2px solid gold;
  border-radius: 12px;
  cursor: pointer;
  box-shadow: 0 0 12px gold, 0 0 20px crimson inset;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.magic-button:hover {
  background: linear-gradient(45deg, gold, crimson);
  box-shadow: 0 0 25px gold, 0 0 40px crimson inset;
  transform: scale(1.05);
}

.magic-button::after {
  content: '';
  position: absolute;
  top: 0;
  left: -75%;
  width: 50%;
  height: 100%;
  background: rgba(255, 255, 255, 0.3);
  transform: skewX(-30deg);
  animation: shine 2.5s infinite;
}

@keyframes shine {
  0% { left: -75%; }
  100% { left: 125%; }
}
</style>

<!-- 🔊 Audio & Video Script + Auto-Close on Scroll -->
<script>
  const elements = document.querySelectorAll('.play-audio-video');

  elements.forEach(el => {
    const audioSrc = el.getAttribute('data-audio');
    const videoURL = el.getAttribute('data-video') + '?autoplay=1';

    // 🎵 Single tap = Play audio
    el.addEventListener('click', (e) => {
      e.stopPropagation();
      if (!el.classList.contains('long-press')) {
        const audio = new Audio(audioSrc);
        audio.play();
      }
    });

    // 🕒 Long press = Play video
    let pressTimer;

    el.addEventListener('touchstart', (e) => {
      pressTimer = setTimeout(() => {
        el.classList.add('long-press');
        const videoFrame = document.getElementById('videoFrame');
        const videoModal = document.getElementById('videoModal');
        videoFrame.src = videoURL;
        videoModal.style.display = 'block';
      }, 600); // 600ms for long press
    });

    el.addEventListener('touchend', (e) => {
      clearTimeout(pressTimer);
      setTimeout(() => el.classList.remove('long-press'), 100);
    });

    // 💻 Still support desktop double click
    el.addEventListener('dblclick', (e) => {
      e.stopPropagation();
      const videoFrame = document.getElementById('videoFrame');
      const videoModal = document.getElementById('videoModal');
      videoFrame.src = videoURL;
      videoModal.style.display = 'block';
    });
  });

  function closeVideo() {
    const videoFrame = document.getElementById('videoFrame');
    videoFrame.src = '';
    document.getElementById('videoModal').style.display = 'none';
  }

  // 🚨 Auto-close video when hero section goes out of view
  window.addEventListener('scroll', () => {
    const hero = document.getElementById('hero');
    const videoModal = document.getElementById('videoModal');

    if (!hero || !videoModal || videoModal.style.display === 'none') return;

    const rect = hero.getBoundingClientRect();
    if (rect.bottom < 0 || rect.top > window.innerHeight) {
      closeVideo();
    }
  });
</script>


    <!-- 🔘 Magical Begin Button -->
    <div class="text-center mt-4" style="z-index: 2; position: relative;">
      <button onclick="scrollToCarousel()" class="magic-begin-your-adventure-btn">
        ⚔️ Begin Your Adventure
      </button>
    </div>

  </div>
</section>

<!-- 🌈 Styles -->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap');

  .enhanced-title {
    display: flex;
    gap: 12px;
    font-family: 'Cinzel', serif;
    font-size: 3.8rem;
    font-weight: 700;
    color: #FFD700;
    text-shadow: 0 0 5px #ffc107,
                 0 0 15px #ff9800,
                 0 0 25px #ff5722,
                 0 0 45px #ff4500;
    animation: glowEnhanced 2.5s ease-in-out infinite alternate;
    flex-wrap: wrap;
    justify-content: center;
  }

  .title-word {
    animation: wordGlow 3s ease-in-out infinite alternate;
  }

  @keyframes glowEnhanced {
    from {
      text-shadow: 0 0 5px #ffc107,
                   0 0 15px #ff9800,
                   0 0 25px #ff5722,
                   0 0 45px #ff4500;
    }
    to {
      text-shadow: 0 0 10px #fffaaa,
                   0 0 25px #ffc107,
                   0 0 35px #ff9800,
                   0 0 60px #ff5722;
    }
  }

  @keyframes wordGlow {
    0% { transform: translateY(0px); opacity: 1; }
    50% { transform: translateY(-8px); opacity: 0.95; }
    100% { transform: translateY(0px); opacity: 1; }
  }

  .intro-quote {
    font-family: 'Cinzel', serif;
    font-size: 1.2rem;
    color: #ffd700cc;
    text-shadow: 0 0 8px #ffa50088;
    animation: fadeQuote 2s ease-in-out forwards;
    opacity: 0;
    margin-bottom: 12px;
  }

  @keyframes fadeQuote {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes popIn {
    0% { opacity: 0; transform: scale(0.4) rotate(-30deg); }
    60% { opacity: 1; transform: scale(1.1) rotate(10deg); }
    100% { transform: scale(1) rotate(0); }
  }

  .animate-pop {
    animation: popIn 1s ease-out forwards;
  }

  .hover-glow-logo {
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    box-shadow: 0 0 20px gold, 0 0 40px goldenrod;
    cursor: pointer;
  }

  .hover-glow-logo:hover {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 0 40px gold, 0 0 80px goldenrod, 0 0 100px orange;
  }

  .magic-overlay {
    position: absolute;
    inset: 0;
    background: url('https://i.ibb.co/fp2WjZL/fog-transparent.gif') center/cover no-repeat;
    opacity: 0.12;
    z-index: 1.5;
    pointer-events: none;
    mix-blend-mode: screen;
  }

  .magic-box:hover {
    transform: scale(1.05);
    box-shadow: 0 0 40px crimson, 0 0 60px rgba(255, 0, 255, 0.5);
    border-color: #ff0080;
    background: linear-gradient(135deg, #220022, #550055);
    cursor: pointer;
  }

  @keyframes fadeInBox {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
  }

  /* 🔘 Begin Button Styles */
  .magic-begin-your-adventure-btn {
    padding: 10px 26px;
    background: linear-gradient(to right, #800000, #ff0000);
    color: white;
    font-weight: bold;
    font-size: 1.05rem;
    font-family: 'Oxanium', sans-serif;
    border: none;
    border-radius: 30px;
    box-shadow: 0 0 12px #ff3b3b99;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .magic-begin-your-adventure-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 0 18px #ff5555;
  }

  /* 📱 Mobile responsiveness */
  @media (max-width: 600px) {
    #profileBox {
      margin-top: 100px;
      width: 95%;
      padding: 15px;
    }

    .magic-begin-your-adventure-btn {
      font-size: 0.95rem;
      padding: 8px 20px;
      position: relative;
    }

    #heroAfterLogin {
      padding-bottom: 40px !important;
    }
  }
</style>

<!-- 🧠 JS to Scroll to Carousel -->
<script>
  function scrollToCarousel() {
    const target = document.getElementById("kingdomSlider");
    if (target) {
      target.scrollIntoView({ behavior: "smooth" });
    } else {
      alert("Carousel section not found!");
    }
  }
</script>

<!-- 🔁 Carousel Slider -->
<div id="kingdomSlider" class="carousel slide mt-5" data-bs-ride="carousel" style="margin-top: 60px;">

  <!-- 🔘 Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#kingdomSlider" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#kingdomSlider" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#kingdomSlider" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#kingdomSlider" data-bs-slide-to="3"></button>
    <button type="button" data-bs-target="#kingdomSlider" data-bs-slide-to="4"></button>
    <button type="button" data-bs-target="#kingdomSlider" data-bs-slide-to="5"></button>
  </div>

  <!-- 🌍 Carousel Content -->
  <div class="carousel-inner">

    <div class="carousel-item active">
      <img src="img/ember.gif" class="d-block w-100 slider-img" alt="Ember">
      <div class="carousel-caption d-block text-center">
        <h5>Kingdom of Ember</h5>
        <p>The blazing realm of fire and shadows.</p>
        <!-- Magical Button -->
          <div class="text-center mt-4">
            <a href="episode.php" class="unleash-btn" style="
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
            📖 Unleash
            </a>
          </div>
      </div>
    </div>

    <div class="carousel-item">
      <img src="img/Trending GIF game of thrones hbo dragon.gif" class="d-block w-100 slider-img" alt="Glacia">
      <div class="carousel-caption d-block text-center">
        <h5>Kingdom of Glacia</h5>
        <p>The icy land of frost and wisdom.</p>
        <!-- Magical Button -->
          <div class="text-center mt-4">
            <a href="episode.php" class="unleash-btn" style="
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
            📖 Unleash
            </a>
          </div>
      </div>
    </div>

    <div class="carousel-item">
      <img src="img/RAGE IS A QUIET THING.gif" class="d-block w-100 slider-img" alt="Syliva">
      <div class="carousel-caption d-block text-center">
        <h5>Kingdom of Syliva</h5>
        <p>The lush forest of ancient spirits and elves.</p>
        <!-- Magical Button -->
          <div class="text-center mt-4">
            <a href="episode.php" class="unleash-btn" style="
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
            📖 Unleash
            </a>
          </div>
      </div>
    </div>

    <div class="carousel-item">
      <img src="img/download.gif" class="d-block w-100 slider-img" alt="Umbra">
      <div class="carousel-caption d-block text-center">
        <h5>Kingdom of Zephyrus</h5>
        <p>The dark empire of mystery and magic.</p>
        <!-- Magical Button -->
          <div class="text-center mt-4">
            <a href="episode.php" class="unleash-btn" style="
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
            📖 Unleash
            </a>
          </div>
      </div>
    </div>

    <div class="carousel-item">
      <img src="img/samurai shadows.gif" class="d-block w-100 slider-img" alt="Umbra">
      <div class="carousel-caption d-block text-center">
        <h5>Samurai Shadow's</h5>
        <p>The dark province of Japan where betrayed warrior fighting through shadows to reclaim his lost honor and uncover the truth.</p>
        <!-- Magical Button -->
          <div class="text-center mt-4">
            <a href="episode.php" class="unleash-btn" style="
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
            📖 Unleash
            </a>
          </div>
      </div>
    </div>

    <div class="carousel-item">
      <img src="img/elvenrage.gif" class="d-block w-100 slider-img" alt="Umbra">
      <div class="carousel-caption d-block text-center">
        <h5>Elven Rage</h5>
        <p>A legendary uprising where an ancient elf awakens her forbidden wrath to shatter the darkness threatening her enchanted realm.</p>
        <!-- Magical Button -->
          <div class="text-center mt-4">
            <a href="episode.php" class="unleash-btn" style="
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
            📖 Unleash
            </a>
          </div>
      </div>
    </div>


  </div>
</div>
<!-- 📜 About Us Section -->
<div class="info-section" style="
  font-size: 1.15rem;
  line-height: 1.75;
  max-width: 880px;
  margin: 60px auto 40px auto;
  padding: 30px;
  background: linear-gradient(135deg, #1e002f, #2c003a);
  border: 2px solid crimson;
  border-radius: 20px;
  box-shadow: 0 0 25px rgba(255, 0, 64, 0.5);
  color: #f2f2f2;
  font-family: 'Cinzel', serif;
  text-shadow: 1px 1px 2px black;
  backdrop-filter: blur(3px);
">

  <h2 class="text-center" style="
    color: crimson;
    margin-bottom: 24px;
    font-weight: bold;
    font-size: 2rem;
    text-shadow: 1px 1px 6px crimson;
  ">
    🧙‍♂️ About Us
  </h2>

  <p class="text-center" style="font-size: 1.15rem; line-height: 2;">
  🌍 The <strong style="color: #ffd700;">Enchanted Realm</strong> once thrived, united across six kingdoms — fire, ice, forest, wind, steel, and spirit. 
  Then came <strong style="color: crimson;">The Shadow</strong>, twisting reality and tearing the realms into chaos.
  You are the chosen flamebearer 🔥, destined to awaken ancient powers, tame legendary beasts 🐉, and restore the balance.
  From <strong style="color:#ff4d4d;">Ember</strong>'s fire to <strong style="color:#00d4ff;">Glacia</strong>'s frost, <strong style="color:#00ff88;">Syliva</strong>'s 
  forests to <strong style="color:#a0e7ff;">Zephyrus</strong>' storms, and the fury of 
  <strong style="color:#cc33ff;">Elven Rage</strong> to the honor of <strong style="color:#ffcc00;">Samurai’s Domain</strong> — your journey begins.
  <span style="color: crimson; font-weight: bold;">This is the Loop of Legends.</span>
</p>

  <!-- Magical Button -->
  <div class="text-center mt-4">
    <a href="about.php" class="read-more-btn" style="
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
      🔍 Read More
    </a>
  </div>
</div>

<!-- 👑 Hover Cards for Kingdoms -->
<section id="portfolio" class="info-section" style="margin-top: 0;">
  <h2 class="text-center mb-4" style="font-size: 2rem; font-weight: bold; color:rgb(208, 10, 10); text-shadow: 1px 1px 4px black;">
    🌍 Kingdoms of the Realm
  </h2>

  <section class="kingdom-cards-section py-3">
    <div class="container d-flex justify-content-center flex-wrap gap-4">

      <!-- Kingdom Card 1 -->
      <div class="kingdom-card text-center">
        <img src="img/kingdom of ember.jpg" alt="Kingdom of Ember" class="img-fluid rounded shadow" style="max-height: 200px; cursor: pointer;" onclick="openLightbox(this)">
        <p class="mt-2">🔥 <strong>Kingdom of Ember</strong> – Known for fire magic and warrior clans.</p>
      </div>

      <!-- Kingdom Card 2 -->
      <div class="kingdom-card text-center">
        <img src="img/kingdom of glacia.jpg" alt="Kingdom of Glacia" class="img-fluid rounded shadow" style="max-height: 200px; cursor: pointer;" onclick="openLightbox(this)">
        <p class="mt-2">❄️ <strong>Kingdom of Glacia</strong> – Land of ice spells and wisdom.</p>
      </div>

      <!-- Kingdom Card 3 -->
      <div class="kingdom-card text-center">
        <img src="img/kingdom of syliva.jpg" alt="Kingdom of Syliva" class="img-fluid rounded shadow" style="max-height: 200px; cursor: pointer;" onclick="openLightbox(this)">
        <p class="mt-2">🌿 <strong>Kingdom of Syliva</strong> – Guardians of forests and beasts.</p>
      </div>

      <!-- Kingdom Card 4 -->
      <div class="kingdom-card text-center">
        <img src="img/kingdom of umbra.jpg" alt="Kingdom of Zephyrus" class="img-fluid rounded shadow" style="max-height: 200px; cursor: pointer;" onclick="openLightbox(this)">
        <p class="mt-2">🌑 <strong>Kingdom of Zephyrus</strong> – Shadows and secrets define them.</p>
      </div>

      <!-- Kingdom Card 5 -->
      <div class="kingdom-card text-center">
        <img src="img/kingdom of samurai1.jpeg" alt="Samurai's Shadows" class="img-fluid rounded shadow" style="max-height: 200px; cursor: pointer;" onclick="openLightbox(this)">
        <p class="mt-2">🗡 <strong>Samurai's Shadows</strong> – Shadows of feudal Japan.</p>
      </div>

      <!-- Kingdom Card 6 -->
      <div class="kingdom-card text-center">
        <img src="img/kingdom of elven rage.jpeg" alt="Elven Rage" class="img-fluid rounded shadow" style="max-height: 200px; cursor: pointer;" onclick="openLightbox(this)">
        <p class="mt-2">🎯 <strong>Elven Rage</strong> – Fury of the elven warrior.</p>
      </div>
    </div>
  </section>
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
           🧝 View The Characters
            </a>
          </div>

</section>
<script>
  function openLightbox(img) {
    document.getElementById("lightbox-img").src = img.src;
    document.getElementById("lightbox").style.display = "flex";
  }

  function closeLightbox() {
    document.getElementById("lightbox").style.display = "none";
  }
</script>

<!-- 🔥 What We Provide -->
<section class="section-padding text-center" style="padding-bottom: 30px;">
  <div class="container">
    <h2 class="dragon-red mb-4"><span class="typewriter">✨🧭 What We Provide</span></h2>
    <p class="mb-5">Enter a realm where every click opens a portal, every choice alters fate, and every game brings you closer to legend.</p>

    <div class="row justify-content-center">
      <!-- Card 1 -->
      <div class="col-md-4 mb-4">
        <div class="card learn-card h-100">
          <div class="card-body">
            <h5 class="card-title">🎮 Fantasy-Based Games</h5>
            <p class="card-text">Play story-rich games inspired by ancient kingdoms, where each realm holds its own secrets, powers, and enemies.</p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4 mb-4">
        <div class="card learn-card h-100">
          <div class="card-body">
            <h5 class="card-title">🌌 Enchanted Realms</h5>
            <p class="card-text">Explore mystical lands — Ember, Glacia, Syliva, and Zephyrus — each filled with puzzles, quests, and magical beings.</p>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4 mb-4">
        <div class="card learn-card h-100">
          <div class="card-body">
            <h5 class="card-title">💀 Villainous Encounters</h5>
            <p class="card-text">Battle mind-controlling shadow beasts, illusionists, and cursed warriors who adapt based on your moves.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action Section -->
<section id="game" class="text-center" style="padding-top: 10px; padding-bottom: 60px;">
  <h2 class="dragon-red mb-3"><span class="typewriter">🎮 Ready to Begin the Journey?</span></h2>
  <p class="mb-4">Unleash the hero within you. Choose your path and enter the enchanted realms.</p>
  <!-- Magical Button -->
          <div class="text-center mt-4">
            <a href="game.php" class="start-your-journey-btn" style="
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
            Start Your Journey
            </a>
          </div>
</section>

<!-- 🎮 Game Trailer Info Section (Hover-Enabled Box) -->
<section id="trailer" style="background-color: #0b0b0b; padding: 70px 20px; color: white;">
  <div class="text-center mb-4">
    <h2 class="typewriter" style="color: crimson;">🎬 Official Game Trailer</h2>
    <p style="color: #bbb;">Dive into the mystical lore of Legends of the Enchanted Realm.</p>
  </div>

  <!-- 📜 Glowing Info Box with Class -->
  <div class="container d-flex justify-content-center">
    <div class="trailer-box">
      <h3 style="color: #ff4c4c;">Rise of the Realms Begins</h3>
      <p style="color: #ccc;">
        Four kingdoms. One destiny.<br>
        🔥 When shadows rise, heroes awaken, 🌪️ In the storm of fate, legends are forged, 🗡️ Blades clash, destinies burn.🔮 The loop begins… again.<br>
        ⚔️ Are you ready to enter the legend?

      </p>
    </div>
  </div>

  <!-- 🔘 Explore Button -->
  <div class="text-center mt-4">
    <a href="new release.php" style="
      padding: 10px 28px;
      background: linear-gradient(to right, #a00000, #ff0000);
      color: white;
      font-weight: bold;
      text-decoration: none;
      border-radius: 30px;
      font-size: 1.05rem;
      box-shadow: 0 0 12px #ff4d4d99;
      transition: all 0.3s ease;
    "
    onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 0 18px #ff5a5a';"
    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 12px #ff4d4d99';">
    🌟 Explore New Release
    </a>
  </div>
</section>

<!-- 🎨 Add This to Your <style> or <head> -->
<style>
  .trailer-box {
  background: linear-gradient(rgba(12, 12, 12, 0.6), rgba(6, 6, 6, 0.6)), 
              url('img/war.png') center center / cover no-repeat;
  border-radius: 20px;
  padding: 30px;
  max-width: 700px;
  text-align: center;
  box-shadow: 0 0 25px #ff3c3c50;
  border: 2px solid crimson;
  transition: all 0.4s ease, background-position 0.8s ease;
  background-position: center center;
}

.trailer-box:hover {
  box-shadow: 0 0 25px #f0202099, 0 0 40px #d6131366;
  border-color: #8B0000; /* Dragon Red */
  transform: scale(1.02);
  background-position: center top; /* Image moves slightly up */
}



</style>

<!-- 🖼️ Gallery Section -->
<section id="gallery" class="info-section text-center" style="padding: 50px 20px;">
  <h2 class="typewriter-heading">📸 Gallery</h2>

  <div class="kingdom-cards d-flex flex-wrap justify-content-center gap-4 mt-4">
    <?php
    include('db.php');
    $sql = "SELECT * FROM gallery WHERE deleted = 0 ORDER BY id DESC LIMIT 4";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
        <div class="kingdom-card">
          <img src="' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['title']) . '" onclick="openLightbox(this)">
          <p>' . htmlspecialchars($row['title']) . '</p>
        </div>';
      }
    } else {
      echo "<p style='color:white;'>No images available.</p>";
    }
    ?>
  </div>

  <!-- 🔗 Full Gallery Button -->
  <div class="text-center mt-4">
    <a href="gallery.php" class="view-full-gallery-btn" style="
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
      🔍 View Full Gallery
    </a>
  </div>
</section>

<!-- 🔍 Lightbox Modal -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
  <span class="close-btn">&times;</span>
  <img id="lightbox-img" src="" alt="Enlarged Image">
</div>

<!-- light box logic -->
<script>
function openLightbox(img) {
  document.getElementById("lightbox-img").src = img.src;
  document.getElementById("lightbox").style.display = "flex";
}

function closeLightbox() {
  document.getElementById("lightbox").style.display = "none";
}
</script>



<!--admin panel shortcut-->
<script>
  document.addEventListener("keydown", function (event) {
    // Check for Ctrl + Shift + A
    if (event.ctrlKey && event.shiftKey && event.key.toLowerCase() === 'a') {
      window.location.href = "admin.php";
    }
  });
</script>
<section id="revies" class="text-center" style="margin-top: 50px; padding-top: 10px; padding-bottom: 60px;">
  <h2 class="dragon-red mb-3"><span class="typewriter">✍️ Recent Reviews</span></h2>
</section>
<?php 
include ('reviewonhome.php');
?>
<!-- 🖋️ Write a Review Button -->
<div class="text-center mt-3">
  <a href="review.php" class="unleash-btn" style="
    padding: 10px 28px;
    background: linear-gradient(to right, #8B0000, #DC143C);
    color: #fff;
    font-weight: bold;
    text-decoration: none;
    border-radius: 30px;
    font-size: 1.05rem;
    box-shadow: 0 0 12px #ff4c4c90;
    transition: all 0.3s ease;
    display: inline-block;
  "
  onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 0 18px #ff5c5c';"
  onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 12px #ff4c4c90';">
  🖋️ Write a Review
  </a>
</div>

<?php 
include ('enquiryonhome.php');
include ('footer.php'); 
?>

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
