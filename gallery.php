<?php include('header.php'); ?>
<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>🖼 Gallery - Loop of Legends</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
  body {
  background-color: #000 !important;
  color: #fff;
  font-family: 'Cinzel', serif;
  padding-top: 90px;
  margin: 0;
  padding-bottom: 0;
}

/* Info Section */
.info-section {
  background-color: #000 !important;
  padding: 50px 20px;
  text-align: center;
}


/* Main Heading */
.info-section h1 {
  color: #ffd700;
  font-size: 2.8rem;
  text-align: center;
  font-family: 'Cinzel', serif;
  text-shadow: 0 0 10px gold, 0 0 20px crimson;
  margin-bottom: 10px;
}

.subtitle {
  font-size: 1.3rem;
  color: #ffdf6c; /* golden glow feel */
  font-style: italic;
  letter-spacing: 1px;
  text-shadow: 0 0 6px rgba(255, 223, 108, 0.8), 
               0 0 12px rgba(255, 223, 108, 0.6);
  margin-bottom: 35px;
  animation: fadeGlow 3s infinite alternate;
}

/* glowing animation */
@keyframes fadeGlow {
  from {
    text-shadow: 0 0 4px rgba(255, 223, 108, 0.7),
                 0 0 10px rgba(255, 223, 108, 0.5);
    transform: scale(1);
  }
  to {
    text-shadow: 0 0 10px rgba(255, 223, 108, 1),
                 0 0 20px rgba(255, 223, 108, 0.9);
    transform: scale(1.03);
  }
}

/* Section Heading */
.info-section h2 {
  color: crimson;
  margin-bottom: 20px;
  font-weight: bold;
  text-shadow: 1px 1px 4px black;
}


/* Gallery Cards */
.kingdom-cards {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
  margin-top: 40px;
}

.kingdom-card {
  background-color: #111;
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
  cursor: pointer;
  border-bottom: 2px solid crimson;
}

.kingdom-card p {
  padding: 10px;
  font-size: 14px;
  color: #eee;
  background-color: #000;
}

/* Lightbox */
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

/* Responsive */
@media (max-width: 768px) {
  .kingdom-card {
    width: 90%;
  }
}

/* Dragon Effects */
.shadow-dragon {
  box-shadow: 0 0 12px crimson, 0 0 24px #ff2e2e;
}

.dragon-red {
  color: #ff2e2e;
  text-shadow: 2px 2px 8px black;
}

/* Footer */
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

/* Mobile Footer */
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


<!-- Main Gallery Section -->
<section id="gallery" class="info-section text-center">
  <h1>🖼️ Gallery</h1>
  <p class="subtitle">✨ Step into the realm of legends — where every image tells a story. ✨</p>

  <!-- 🔘 Filter Buttons -->
  <div class="filter-btns mb-4">
    <button class="btn btn-danger active" onclick="filterGallery('all', event)">All</button>
    <button class="btn btn-danger" onclick="filterGallery('kingdom', event)">Kingdom</button>
    <button class="btn btn-danger" onclick="filterGallery('games', event)">Games</button>
  </div>

  <!-- 🖼 Kingdom Gallery Section -->
  <section class="info-section text-center gallery-section" data-category="kingdom">
    <h2>📸 Kingdom Imagery</h2>
    <div class="kingdom-cards d-flex flex-wrap justify-content-center gap-4 mt-4">
      <?php
        $sql = "SELECT * FROM gallery WHERE deleted = 0 AND category = 'kingdom' ORDER BY uploaded_at DESC";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0):
          while ($row = $result->fetch_assoc()):
      ?>
        <div class="kingdom-card gallery-item" data-category="kingdom">
          <img src="<?= htmlspecialchars($row['image_path']) ?>" 
               alt="<?= htmlspecialchars($row['title']) ?>" 
               onclick="openLightbox(this)">
          <p><?= htmlspecialchars($row['title']) ?></p>
        </div>
      <?php
          endwhile;
        else:
          echo "<p>No kingdom images found.</p>";
        endif;
      ?>
    </div>
  </section>

  <!-- 🎮 Game Gallery Section -->
  <section class="info-section text-center gallery-section" data-category="games">
    <h2>🎮 Game Imagery</h2>
    <div class="kingdom-cards d-flex flex-wrap justify-content-center gap-4 mt-4">
      <?php
        $sql = "SELECT * FROM gallery WHERE deleted = 0 AND category = 'game' ORDER BY uploaded_at DESC";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0):
          while ($row = $result->fetch_assoc()):
      ?>
        <div class="kingdom-card gallery-item" data-category="games">
          <img src="<?= htmlspecialchars($row['image_path']) ?>" 
               alt="<?= htmlspecialchars($row['title']) ?>" 
               onclick="openLightbox(this)">
          <p><?= htmlspecialchars($row['title']) ?></p>
        </div>
      <?php
          endwhile;
        else:
          echo "<p>No game images found.</p>";
        endif;
      ?>
    </div>
  </section>

</section>

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

  // Gallery Filter
  function filterGallery(category, event) {
    // active button style
    document.querySelectorAll('.filter-btns button').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');

    // show/hide sections (titles + cards together)
    document.querySelectorAll('.gallery-section').forEach(section => {
      if (category === "all" || section.dataset.category === category) {
        section.style.display = "block";
      } else {
        section.style.display = "none";
      }
    });
  }

  // Default = All
  document.addEventListener("DOMContentLoaded", function() {
    filterGallery('all', {target: document.querySelector('.filter-btns button')});
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const logoutBtn = document.getElementById("logoutBtn");
    if (logoutBtn) {
      logoutBtn.addEventListener("click", function () {
        window.location.href = "logout.php";
      });
    }
  });
</script>

<?php include('footer.php'); ?>
</body>
</html>