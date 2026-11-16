<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Loop of Legends</title>
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <style>
  body {
    background-color: #000;
    color: #fff;
    font-family: 'Cinzel', serif;
    padding-top: 80px; /* enough to avoid navbar overlap */
  }

  .navbar {
    background: linear-gradient(90deg, #0d0d1a, #1a001a);
    box-shadow: 0 4px 10px rgba(255, 0, 0, 0.3);
  }

  .navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
    color: crimson !important;
    animation: flicker 2s infinite alternate;
  }

  @keyframes flicker {
    0% { opacity: 1; text-shadow: 0 0 5px red; }
    50% { opacity: 0.8; text-shadow: 0 0 10px crimson; }
    100% { opacity: 1; text-shadow: 0 0 20px darkred; }
  }

  .nav-logo {
  width: 50px; /* ya jo bhi size tu chahe */
  height: auto;
  transition: transform 0.3s ease, filter 0.3s ease;
  border: none;
  outline: none;
  border-radius: 0;
  background: none;
}

.nav-logo:hover {
  transform: scale(1.1);
  filter: drop-shadow(0 0 10px rgba(255, 0, 0, 0.7)); /* 🔥 Optional red glow */
}


  .nav-link {
    color: #fff !important;
    font-size: 1rem;
    padding: 0 10px;
    display: flex;
    align-items: center;
    gap: 5px;
  }

  .nav-link:hover {
    color: crimson !important;
  }

  .navbar-nav {
    flex-direction: row;
    flex-wrap: nowrap; /* stops breaking into multiple lines */
    align-items: center;
  }

  .navbar-toggler {
    border-color: crimson;
  }

  @media (max-width: 991px) {
    .navbar-nav {
      flex-direction: column;
    }
  }
</style>
<body>
<!-- 🔺 Navbar HTML -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="z-index: 1030;">
  <div class="container-fluid d-flex align-items-center justify-content-between">

    <!-- 🔥 Logo + Title -->
<div class="d-flex align-items-center">
  <img src="img/mainlogo.png" alt="Logo" class="nav-logo">
  <a class="navbar-brand" href="#">Loop of Legends</a>
</div>


    <!-- 📱 Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- 🔗 Links -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">🏠 Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">📘 About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="episode.php">📖 Episodes</a></li>
        <li class="nav-item"><a class="nav-link" href="game.php">🎮 Games</a></li>
        <li class="nav-item"><a class="nav-link" href="characters.php">🧙 Characters</a></li>
        <li class="nav-item"><a class="nav-link" href="new release.php">🎬 New Release</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">🖼️ Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="review.php">⭐ Reviews</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">📨 Contact</a></li>
      </ul>
    </div>

  </div>
</nav>

<!-- ✅ Auto Close Navbar Script -->
<script>
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      const navbarCollapse = document.querySelector('.navbar-collapse');
      if (navbarCollapse.classList.contains('show')) {
        bootstrap.Collapse.getInstance(navbarCollapse).hide();
      }
    });
  });
</script>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
