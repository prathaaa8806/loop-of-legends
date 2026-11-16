<?php include ('header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>🎬 Game Trailer- Loop of Legends</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
  /* ❌ Image removed from background */
body {
  font-family: 'Cinzel', serif;
  color: white;
  margin: 0;
  padding: 0;
  position: relative;
  z-index: 0;
}

/* ✅ Dark overlay over video */
body::before {
  content: "";
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0, 0, 0, 0.6); /* adjust darkness */
  z-index: -1;
}

/* ✅ Background video styling */
#bgVideo {
  position: fixed;
  top: 0;
  left: 0;
  min-width: 100%;
  min-height: 100%;
  object-fit: cover;
  z-index: -2;
}


    
    
    .video-section {
  padding: 60px 20px;
  background: transparent;
  color: #fff;
  font-family: 'Cinzel', serif;
  text-align: center;
}

.video-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
}

.trailer-frame {
  width: 90%;
  max-width: 800px;
  height: auto;
  border: 4px solid crimson;
  border-radius: 20px;
  box-shadow: 0 0 30px crimson;
}
.trailer-frame:hover {
  filter: brightness(1.1) contrast(1.2);
  box-shadow: 0 0 40px #ff0033aa, 0 0 60px crimson;
}
.trailer-heading {
  color: #ff1a1a; /* Dragon red */
  text-align: center;
  margin-top: 100px; /* Adjust this if still overlapping */
  font-size: 2.5rem;
  font-family: 'Cinzel', serif;
  text-shadow: 2px 2px 4px black; /* Optional glow effect */
}

/* 📱 Mobile Friendly */
@media (max-width: 768px) {
  .trailer-frame {
    width: 100%;
    height: auto;
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

.submit-magic-btn {
  padding: 12px 30px;
  background: linear-gradient(to right, #7a0000, #ff1a1a);
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 40px;
  font-size: 1.05rem;
  box-shadow: 0 0 15px rgba(220, 20, 60, 0.6);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
  cursor: not-allowed;
  opacity: 0.6;
}

/* When enabled */
.submit-magic-btn.enabled {
  opacity: 1;
  cursor: pointer;
}

/* Hover effect when enabled */
.submit-magic-btn.enabled:hover {
  transform: scale(1.05);
  box-shadow: 0 0 20px crimson, 0 0 30px #ff4d4d;
}

/* Click press effect */
.submit-magic-btn.enabled:active {
  transform: scale(0.95);
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
.review-box {
  max-width: 700px;
  margin: 50px auto;
  background: transparent;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 0 20px crimson;
  transition: all 0.3s ease;
}

.review-box:hover {
  box-shadow: 0 0 40px #ff0004ff;
  transform: scale(1.02);
  background: rgba(255, 0, 80, 0.05); /* Optional soft glow inside */
  cursor: pointer;
}
#feedback:hover {
    border-color: #ff0004ff;
    background: rgba(80, 0, 80, 0.7);
    box-shadow: 0 0 15px #ff0004ff;
  }
  </style>
    </head>
<body>
<video autoplay muted loop playsinline id="bgVideo">
  <source src="img/bg video.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

<section id="new-release" class="video-section">
  <h2 class="trailer-heading">🎬 Game Trailer</h2>

  <div class="video-wrapper">
    <video id="characterTrailer" class="trailer-frame" autoplay loop controls>
      <source src="img/trailer.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
  </div>

  <p style="text-align: center; font-size: 1.2rem;">
    So Are You Ready? For <strong style="color: #ff4d4d;">Legends of the Enchanted Realm</strong>!
  </p>
</section>

<!-- 💬 Review Area -->
<div class="review-box">
  <h3 style="color: #d91f1fff;">💬 Leave a Review</h3>

  <!-- ⭐ Star Rating -->
  <div id="star-rating" style="margin: 15px 0;">
    <span class="star" data-value="1">★</span>
    <span class="star" data-value="2">★</span>
    <span class="star" data-value="3">★</span>
    <span class="star" data-value="4">★</span>
    <span class="star" data-value="5">★</span>
  </div>

 <!-- 🧑‍💻 Name Input -->
<input id="userName" type="text" placeholder="Enter your name" style="
  width: 100%;
  padding: 12px;
  border-radius: 10px;
  border: 2px solid crimson;
  background: rgba(42, 0, 42, 0.6);
  color: white;
  margin-bottom: 15px;
  transition: all 0.3s ease;
" />

<!-- ✍️ Feedback -->
<textarea id="feedback" rows="4" placeholder="Share your thoughts..." style="
  width: 100%;
  padding: 15px;
  border-radius: 10px;
  border: 2px solid crimson;
  background: rgba(42, 0, 42, 0.6);
  color: white;
  margin-bottom: 15px;
  transition: all 0.3s ease;
"></textarea>

  <button id="submitBtn" class="btn" disabled style="
    padding: 10px 26px;
    background: linear-gradient(to right, #800000, #ff0000);
    color: white;
    font-weight: bold;
    border-radius: 30px;
    font-size: 1.05rem;
    box-shadow: 0 0 12px #ff3b3b99;
    opacity: 0.6;
    cursor: not-allowed;
    transition: all 0.3s ease;
  ">
    📩 Submit
  </button>

  <!-- 👥 Review Output -->
  <div id="review-container" style="margin-top: 30px;">
    <h4 style="color: #d91f1fff;">Recent Reviews</h4>

    <?php
include('db.php');
$sql = "SELECT rating, your_message, user_name, admin_reply FROM submit_trailer_review ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);

if ($result) {
  while ($row = $result->fetch_assoc()) {
    $stars = str_repeat("⭐", $row['rating']) . str_repeat("☆", 5 - $row['rating']);
    $name = htmlspecialchars($row['user_name']);
    $msg = htmlspecialchars($row['your_message']);
    $adminReply = !empty($row['admin_reply']) ? nl2br(htmlspecialchars($row['admin_reply'])) : null;

    echo "<div style='background: #220022; padding: 15px; border-radius: 10px; margin-top: 10px;'>
            <strong style='color:#ff4d88;'>$name</strong><br>$stars<br><em>\"$msg\"</em>";

    // ✅ Agar admin reply hai toh usko bhi show karo
    if ($adminReply) {
      echo "<div style='margin-top:10px; padding:10px; background:#330033; border-left:4px solid crimson; border-radius:6px;'>
              <strong style='color:#ffcc00;'>👑 Admin Reply:</strong><br>$adminReply
            </div>";
    }

    echo "</div>";
  }
} else {
  echo "<p style='color: crimson;'>Error loading reviews: " . $conn->error . "</p>";
}
?>
</div>
</div>

<!-- ⭐ JavaScript -->
<script>
  const stars = document.querySelectorAll('.star');
  const feedback = document.getElementById('feedback');
  const submitBtn = document.getElementById('submitBtn');
  const reviewContainer = document.getElementById('review-container');
  const userInput = document.getElementById('userName');
  let selectedRating = 0;

  stars.forEach((star, index) => {
    star.style.fontSize = '2rem';
    star.style.cursor = 'pointer';
    star.style.color = '#555';

    star.addEventListener('click', () => {
      selectedRating = index + 1;
      updateStars(selectedRating);
      checkForm();
    });

    star.addEventListener('mouseover', () => {
      updateStars(index + 1);
    });

    star.addEventListener('mouseout', () => {
      updateStars(selectedRating);
    });
  });

  function updateStars(rating) {
    stars.forEach((star, index) => {
      star.style.color = index < rating ? '#ffcc00' : '#555';
    });
  }

  feedback.addEventListener('input', checkForm);
  userInput.addEventListener('input', checkForm);

  function checkForm() {
    const hasText = feedback.value.trim().length > 0;
    const hasName = userInput.value.trim().length > 0;
    submitBtn.disabled = !(hasText && hasName && selectedRating > 0);
    submitBtn.style.cursor = submitBtn.disabled ? 'not-allowed' : 'pointer';
    submitBtn.style.opacity = submitBtn.disabled ? '0.6' : '1';
  }

  submitBtn.addEventListener('click', () => {
    const message = feedback.value.trim();
    const userName = userInput.value.trim();

    fetch('submit_review.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: `rating=${encodeURIComponent(selectedRating)}&your_message=${encodeURIComponent(message)}&user_name=${encodeURIComponent(userName)}`
    })
    .then(res => res.text())
    .then(data => {
      if (data.trim() === "success") {
        const newReview = document.createElement('div');
        newReview.style.cssText = 'background: #220022; padding: 15px; border-radius: 10px; margin-top: 10px;';
        const starsHTML = '⭐'.repeat(selectedRating) + '☆'.repeat(5 - selectedRating);
        newReview.innerHTML = `<strong style="color: #ff6699;">🧝 ${userName}</strong><br>${starsHTML}<br><em>"${message}"</em>`;
        reviewContainer.insertBefore(newReview, reviewContainer.children[1]);
        feedback.value = '';
        userInput.value = '';
        selectedRating = 0;
        updateStars(0);
        checkForm();
        alert("🎉 Thank you for your feedback!");
      } else {
        alert("❌ Failed: " + data);
      }
    });
  });
</script>

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

