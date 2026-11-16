<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🌒 The Crimson Rift</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    html {
  scroll-behavior: smooth;
}

body {
  margin: 0;
  padding: 0;
  background: linear-gradient(to bottom, #0a000f, #1a001a);
  color: white;
  font-family: 'Cinzel', serif;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  overflow-x: hidden;
}

main {
  flex: 1;
  padding: 120px 20px 40px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.typewriter-wrapper {
  display: inline-block;
  overflow: hidden;
  white-space: normal; /* ✅ change */
  border-right: 2px solid crimson;
  font-size: clamp(1rem, 4vw, 1.4rem);
  max-width: 95%;
  animation: typing 5s steps(40, end), blink 0.8s step-end infinite;
  text-align: center;
}

@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

@keyframes blink {
  50% { border-color: transparent }
}

.villain {
  margin-top: 40px;
  max-width: 280px;
  width: 90%;
  filter: brightness(0.8) contrast(1.2);
  border-radius: 10px;
  box-shadow: 0 0 20px crimson;
  animation: fadeIn 2s ease-in-out forwards;
  opacity: 0;
  transition: all 0.4s ease;
}

.villain:hover {
  transform: scale(1.05);
  box-shadow: 0 0 30px red;
}

@keyframes fadeIn {
  to { opacity: 1; }
}

.enter-btn {
  margin-top: 30px;
  padding: 10px 30px;
  font-size: 1.05rem;
  background: linear-gradient(to right, #550000, #cc0000);
  color: white;
  border: none;
  border-radius: 30px;
  cursor: pointer;
  font-weight: bold;
  box-shadow: 0 0 12px crimson;
  transition: all 0.3s ease;
}

.enter-btn:hover {
  transform: scale(1.1);
  box-shadow: 0 0 20px red;
}

/* 🔍 Lightbox */
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

/* 🔻 Footer */
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

/* 👌 Extra Mobile Tweaks */
@media (max-width: 480px) {
  .typewriter-wrapper {
    font-size: 1rem;
    max-width: 95%;
  }

  .enter-btn {
    font-size: 0.95rem;
    padding: 8px 20px;
  }
}

  </style>
</head>
<body>

<main>
  <!-- 🌑 Typewriter Text -->
  <div class="typewriter-wrapper">
    The Rift has opened... A shadow from the ancient war stirs again.
  </div>

  <!-- 👤 Villain Image with Lightbox -->
  <img src="img/shadow villan.jpg" onclick="openLightbox(this)" alt="Villain Shadow" class="villain" id="villainImage">

  <!-- 🩸 Trial Button -->
  <button class="enter-btn" onclick="enterDeeper()">🩸 Begin the Trial</button>
</main>

<!-- 🔍 Lightbox Modal -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
  <span class="close-btn">&times;</span>
  <img id="lightbox-img" src="" alt="Enlarged Image">
</div>

<!-- 🎶 Background Music -->
<audio id="riftMusic" src="voice/horror-background-atmosphere-156462.mp3" autoplay loop></audio>

<!-- ⚙️ Scripts -->
<script>
  function enterDeeper() {
    window.location.href = "trial.php";
  }

  // Villain reveal delay
  setTimeout(() => {
    document.getElementById("villainImage").style.opacity = 1;
  }, 5000);

  function openLightbox(img) {
    document.getElementById("lightbox-img").src = img.src;
    document.getElementById("lightbox").style.display = "flex";
  }

  function closeLightbox() {
    document.getElementById("lightbox").style.display = "none";
  }
</script>

<!-- 🔻 Footer Include -->
<?php include('footer.php'); ?>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
