<?php
include('db.php');
include('header.php');

// ✅ Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_name = htmlspecialchars(trim($_POST['user_name']));
  $rating = intval($_POST['rating']);
  $your_message = htmlspecialchars(trim($_POST['your_message']));
  $admin_reply = null; // 🔥 Fix: default NULL when user submits

  if (!empty($user_name) && $rating >= 1 && $rating <= 5 && !empty($your_message)) {
    $stmt = $conn->prepare("INSERT INTO reviews (user_name, rating, your_message, admin_reply) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $user_name, $rating, $your_message, $admin_reply);
    $stmt->execute();
    $stmt->close();
  }
}

// ✅ Fetch latest reviews (include id for edit button later)
$sql = "SELECT id, user_name, rating, your_message, admin_reply 
        FROM reviews 
        WHERE deleted = 0 
        ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Loop of Legends - Review</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>

    body {
      background: #000;
      font-family: 'Cinzel', serif;
      color: #ffd700;
      margin: 0;
      padding: 120px 20px 40px; /* ✅ Top padding added */
    }

    .container {
      padding-top: 120px; /* ✅ enough space below fixed navbar */
      padding-bottom: 50px;
      max-width: 900px;
      margin: 0 auto;
    }

    h2 {
      text-align: center;
      font-size: 2rem;
      color: crimson;
      text-shadow: 0 0 10px red;
      margin-top: 40px; /* ✅ Enough margin below navbar */
      margin-bottom: 25px;
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

    /* ✅ Review Card Form */
.review-card {
  background: #180018;
  padding: 30px;
  border-radius: 20px;
  border: 2px solid crimson;
  box-shadow: 0 0 15px crimson;
  text-align: center; /* ⭐ Center align */
}

/* ✅ Input & Textarea Center + Same Width */
.review-card input,
.review-card textarea {
  width: 80%; /* same size sabka */
  max-width: 1000px;
  margin: 15px auto; /* center align */
  display: block;
  text-align: center;
  font-size: 1rem;
}

    .star-rating {
  display: flex;
  justify-content: center;
  direction: ltr; /* ⭐ left-to-right */
}

.star-rating input {
  display: none;
}

.star-rating label {
  font-size: 2.2rem;
  color: #555;
  cursor: pointer;
  transition: color 0.3s ease;
  padding: 0 4px;
}

/* ⭐ Gold highlight for selected */
.star-rating input:checked ~ label {
  color: #555; /* reset all */
}

.star-rating label:hover,
.star-rating label:hover ~ label,
.star-rating input:checked ~ label:hover,
.star-rating input:checked ~ label:hover ~ label {
  color: gold;
}

/* ✅ Apply gold to selected and all before it */
.star-rating input:checked + label,
.star-rating input:checked + label ~ label {
  color: gold;
}


    .submit-btn {
      margin-top: 20px;
      background: crimson;
      color: white;
      font-weight: bold;
      padding: 12px 30px;
      border-radius: 30px;
      border: none;
      box-shadow: 0 0 15px crimson;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .submit-btn:hover {
      background: gold;
      color: black;
      box-shadow: 0 0 20px gold;
      transform: scale(1.05);
    }

    /* ✅ Review Box Uniform + Center */
.review-box {
  background: #1a001a;
  border: 1px solid #ff3366;
  border-radius: 15px;
  padding: 20px;
  margin: 20px auto;
  max-width: 1000px; /* sab ek jaisa width */
  text-align: center; /* ⭐ content center */
  box-shadow: 0 0 10px #990033;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.review-box p {
  font-size: 1rem; /* ⭐ sab text ek size */
  margin: 10px 0;
}

    .review-box:hover {
      transform: scale(1.03);
      box-shadow: 0 0 20px #ff3366;
    }

    .stars {
      color: gold;
      font-size: 1.2rem;
      text-align: center;
      margin-bottom: 10px;
    }

    /* ✅ User name bhi center */
.review-user {
  font-size: 0.9rem;
  color: #ffcccc;
  margin-top: 10px;
  text-align: center;
}

    .section-title {
      text-align: center;
      color: crimson;
      margin-top: 60px;
      text-shadow: 0 0 10px crimson;
    }

    @media (max-width: 768px) {
      .container {
        padding: 100px 20px 40px;
      }
    }

    .shadow-dragon {
      box-shadow: 0 0 12px crimson, 0 0 24px #ff2e2e;
    }

    .dragon-red {
      color: #ff2e2e;
      text-shadow: 2px 2px 8px black;
    }

    .slim-footer {
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

    * {
      box-sizing: border-box;
    }

    html, body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }
  
    .star-rating {
  display: flex;
  flex-direction: row-reverse; /* ⭐️ High rating on left side */
  justify-content: center;
}

.star-rating label {
  order: 1;
}

.star-rating input:checked ~ label {
  color: gold;
}

  </style>
</head>
<body>

<div class="container">
<h2>⭐ Share Your Experience</h2>

<div class="review-card">
  <form method="POST" action="">
    <p style="text-align: center;">HOW WOULD YOU RATE <strong>LOOP OF LEGENDS</strong>?</p>

    <div class="star-rating">
  <input type="radio" name="rating" value="5" id="star5" />
  <label for="star5">★</label>

  <input type="radio" name="rating" value="4" id="star4" />
  <label for="star4">★</label>

  <input type="radio" name="rating" value="3" id="star3" />
  <label for="star3">★</label>

  <input type="radio" name="rating" value="2" id="star2" />
  <label for="star2">★</label>

  <input type="radio" name="rating" value="1" id="star1" />
  <label for="star1">★</label>
</div>



    <input type="text" name="user_name" placeholder="Your Name" required>
    <textarea name="your_message" rows="4" placeholder="Write your thoughts..." required></textarea>

    <div style="text-align:center;">
      <button type="submit" class="submit-btn">✨ Submit Review</button>
    </div>
  </form>
</div>

<h3 class="section-title">Sample Reviews</h3>

<div class="review-box">
  <div class="stars">⭐️⭐️⭐️⭐️⭐️</div>
  <p>"An immersive fantasy world with code — brilliant!"</p>
  <div class="review-user">~ Aarya K.</div>
</div>

<div class="review-box">
  <div class="stars">⭐️⭐️⭐️⭐️</div>
  <p>"Creative concept and amazing dark theme!"</p>
  <div class="review-user">~ Dev Mishra</div>
</div>

<h3 class="section-title">Reviews By Legends</h3>

<?php
if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $stars = str_repeat("⭐️", $row['rating']);
    $admin_reply = !empty($row['admin_reply']) ? nl2br(htmlspecialchars($row['admin_reply'])) : null;
    $review_id = $row['id'];

    echo "
    <div class='review-box'>
      <div class='stars'>$stars</div>
      <p>“ " . htmlspecialchars($row['your_message']) . " ”</p>";

    // 🔔 Admin Reply (inside review box, above username)
    if ($admin_reply) {
      echo "
      <div style='
        margin: 12px auto;
        padding: 10px;
        background: rgba(255, 215, 0, 0.1);
        border-left: 3px solid gold;
        border-radius: 8px;
        font-size: 0.85rem;
        color: #faf9f7ff;
        font-style: italic;
        max-width: 90%;
        text-align: left;
      '>
        🔔 <strong>Admin Reply:</strong><br>
        $admin_reply
      </div>";
    }

    echo "
      <div class='review-user'>~ " . htmlspecialchars($row['user_name']) . "</div>
    </div>";
  }
} else {
  echo "<p style='text-align:center;'>No recent reviews yet.</p>";
}
$conn->close();
?>
</div>
<?php include ('footer.php'); ?>

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
