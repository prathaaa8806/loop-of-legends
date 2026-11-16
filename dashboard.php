<?php
include('auth.php');
include('db.php');
include('admin_header.php');

$episodeCount = $conn->query("SELECT COUNT(*) FROM episodes WHERE deleted = 0")->fetch_row()[0];
$characterCount = $conn->query("SELECT COUNT(*) FROM characters WHERE is_deleted = 0")->fetch_row()[0];
$gameCount = $conn->query("SELECT COUNT(*) FROM games WHERE deleted=0")->fetch_row()[0];
$galleryCount = $conn->query("SELECT COUNT(*) FROM gallery WHERE deleted = 0")->fetch_row()[0];
$reviewCount = $conn->query("SELECT COUNT(*) FROM reviews WHERE deleted = 0")->fetch_row()[0];
$trailerreviewsCount = $conn->query("SELECT COUNT(*) FROM submit_trailer_review WHERE is_deleted = 0")->fetch_row()[0];
$supportquestionsCount = $conn->query("SELECT COUNT(*) FROM support_questions WHERE deleted = 0")->fetch_row()[0];
$contactCount = $conn->query("SELECT COUNT(*) FROM contact WHERE deleted = 0")->fetch_row()[0];

$episodeDeleted = $conn->query("SELECT COUNT(*) FROM episodes WHERE deleted = 1")->fetch_row()[0];
$characterDeleted = $conn->query("SELECT COUNT(*) FROM characters WHERE is_deleted = 1")->fetch_row()[0];
$gameDeleted = $conn->query("SELECT COUNT(*) FROM games WHERE deleted=1")->fetch_row()[0];
$galleryDeleted = $conn->query("SELECT COUNT(*) FROM gallery WHERE deleted = 1")->fetch_row()[0];
$reviewDeleted = $conn->query("SELECT COUNT(*) FROM reviews WHERE deleted = 1")->fetch_row()[0];
$trailerreviewsDeleted = $conn->query("SELECT COUNT(*) FROM submit_trailer_review WHERE is_deleted = 1")->fetch_row()[0];
$supportquestionsDeleted = $conn->query("SELECT COUNT(*) FROM support_questions WHERE deleted = 1")->fetch_row()[0];
$contactDeleted = $conn->query("SELECT COUNT(*) FROM contact WHERE deleted = 1")->fetch_row()[0];

// ⭐ Rating breakdown (only non-deleted)
$ratingCounts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
$sql = "SELECT rating, COUNT(*) as count FROM reviews WHERE deleted = 0 GROUP BY rating";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  $ratingCounts[(int)$row['rating']] = (int)$row['count'];
}

// 🔴 Count deleted reviews
$deletedCount = 0;
$deletedResult = $conn->query("SELECT COUNT(*) as count FROM reviews WHERE deleted = 1");
if ($deletedRow = $deletedResult->fetch_assoc()) {
  $deletedCount = (int)$deletedRow['count'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard - Loop of Legends</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      margin: 0;
      padding: 40px;
      font-family: 'Cinzel', serif;
      background: radial-gradient(ellipse at center, #c01515ff 0%, #380404ff 100%);
      color: #ffd700;
      text-align: center;
    }

    .dashboard-heading {
      font-size: 3.2rem;
      font-weight: bold;
      color: #ffcc00;
      text-shadow: 0 0 20px crimson, 0 0 40px gold;
      margin-bottom: 20px;
      padding-bottom: 0px;
      font-family: 'Cinzel', serif;
    }

    @keyframes pulseText {
      0%, 100% { transform: scale(1); text-shadow: 0 0 20px crimson, 0 0 40px gold; }
      50% { transform: scale(1.03); text-shadow: 0 0 40px crimson, 0 0 60px gold; }
    }

    .glass-box {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 16px;
      padding: 20px;
      margin: 30px auto;
      max-width: 900px;
      box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 215, 0, 0.2);
      transition: 0.4s ease;
      text-align: center;
    }

    .glass-box:hover {
      box-shadow: 0 0 25px crimson;
      transform: scale(1.01);
    }

    .welcome {
      font-size: 1.3rem;
      color: #ffe6cc;
      margin-top: 10px;
    }

    .summary-line {
      font-size: 1.1rem;
      color: #ffcc99;
      background: rgba(255, 255, 255, 0.05);
      padding: 14px 20px;
      border-radius: 12px;
      box-shadow: inset 0 0 15px #4d0000;
      margin-bottom: 20px;
      display: inline-block;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0 auto 40px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      max-width: 950px;
    }

    li a {
      color: #fff2e6;
      text-decoration: none;
      font-size: 1.15rem;
      display: block;
      padding: 14px;
      background: rgba(0, 0, 0, 0.4);
      border-left: 6px solid crimson;
      border-radius: 12px;
      box-shadow: 0 0 8px #990000;
      transition: all 0.3s ease;
      width: 250px;
    }

    li a:hover {
      background: #660000;
      color: gold;
      box-shadow: 0 0 20px #ff3300;
      transform: translateY(-2px) scale(1.04);
    }

    .magic-logout-btn {
      margin-top: 40px;
      padding: 12px 30px;
      font-size: 1rem;
      font-weight: bold;
      font-family: 'Cinzel', serif;
      background: linear-gradient(to right, #7f0000, #cc0000);
      color: white;
      border: none;
      border-radius: 14px;
      box-shadow: 0 0 18px #ff3333;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .magic-logout-btn:hover {
      background: linear-gradient(to right, #cc0000, #7f0000);
      transform: scale(1.07);
      box-shadow: 0 0 30px gold;
      color: gold;
    }

    .stats-heading {
      font-size: 2rem;
      color: #ffcc00;
      text-shadow: 0 0 10px crimson, 0 0 25px gold;
      margin-top: 50px;
      margin-bottom: 20px;
    }

    #statsChart {
  max-width: 850px;
  margin: 0 auto 40px;
  background: linear-gradient(
    135deg,
    rgba(167, 20, 20, 0.9),
    rgba(40, 0, 0, 0.6)
  );
  padding: 20px;
  border-radius: 16px;
  box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
}

    .overview-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 20px;
    padding: 30px;
  }

  .stat-card {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0.3));
    border: 1px solid rgba(255, 215, 0, 0.2);
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    color: #ffe;
    box-shadow: 0 0 12px rgba(255, 0, 0, 0.3);
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    position: relative;
    overflow: hidden;
  }

  .stat-card:hover {
    transform: translateY(-5px) scale(1.03);
    box-shadow: 0 0 25px rgba(255, 255, 0, 0.5);
  }

  .stat-icon {
    font-size: 2rem;
    margin-bottom: 8px;
  }

  .stat-label {
    font-size: 1.1rem;
    font-weight: 600;
    color: #ffcc00;
    font-family: 'Poppins', sans-serif;
  }

  .stat-count {
    font-size: 1.6rem;
    color: gold;
    font-weight: bold;
  }
  .chart-wrapper {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 30px;
    flex-wrap: wrap; /* Optional for responsiveness */
    margin: 20px;
  }

  .chart-box {
  background: linear-gradient(
    135deg,
    rgba(167, 20, 20, 0.85),
    rgba(40, 0, 0, 0.7)
  );
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
  width: 500px;
  height: 300px;
}


  canvas {
    width: 100% !important;
    height: 100% !important;
  }

  .stats-heading {
    font-size: 2rem;
    color: #ffd700;
    text-shadow: 0 0 8px crimson, 0 0 16px gold;
    margin-top: 50px;
    margin-bottom: 20px;
    padding-bottom: 0px;
    font-family: 'Cinzel', serif;
    text-align: center;
  }

  @keyframes pulseText {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.6; }
  }
  .chart-box {
  background: linear-gradient(135deg, rgba(167, 20, 20, 0.85), rgba(40, 0, 0, 0.7));
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
  width: 500px;
  height: 300px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* 🔥 Hover Effect */
.chart-box:hover {
  transform: scale(1.03);
  box-shadow: 0 0 25px rgba(255, 215, 0, 0.6), 0 0 10px rgba(220, 20, 60, 0.5);
  cursor: pointer;
}

  .magic-logout-btn {
    padding: 12px 25px;
    background: linear-gradient(to right, #8b0000, #ff4500);
    color: white;
    border: none;
    font-size: 1rem;
    font-weight: bold;
    font-family: 'Cinzel', serif;
    border-radius: 12px;
    box-shadow: 0 0 15px gold;
    cursor: pointer;
    transition: 0.3s;
  }

  .magic-logout-btn:hover {
    transform: scale(1.06);
    box-shadow: 0 0 25px gold;
  }

  .admin-buttons {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 25px;
  }
  .admin-scroll {
  background: url('img/control6.jpg') no-repeat center center;
  background-size: cover;
  border: none;
  border-radius: 50px / 20px; /* elliptical border for scroll effect */
  padding: 60px 40px;
  width: 90%;
  max-width: 1000px;
  margin: 10px auto 50px auto;
  font-family: 'Cinzel', serif;
  box-shadow: inset 0 0 20px rgba(0,0,0,0.3), 0 0 30px rgba(255, 215, 0, 0.6);
  color: #fff;
  position: relative;
  background-color: transparent;
  transition: 0.4s ease;
}

.admin-scroll:hover {
  box-shadow: inset 0 0 20px rgba(0,0,0,0.5), 0 0 60px gold, 0 0 90px crimson;
  transform: scale(1.02);
}


.admin-scroll::before,
.admin-scroll::after {
  content: "";
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  width: 90%;
  height: 20px;
  background: radial-gradient(ellipse at center, #fff2 0%, transparent 70%);
  border-radius: 50%;
  z-index: -1;
}

.admin-scroll::before {
  top: -10px;
}

.admin-scroll::after {
  bottom: -10px;
}


  </style>
</head>
<body>
  
<div class="glass-box summary-line">
    Episodes: <?= $episodeCount ?> |
    Characters: <?= $characterCount ?> |
    Games: <?= $gameCount ?> |
    Reviews: <?= $reviewCount ?> |
    Gallery: <?= $galleryCount ?> |
    Trailer Reviews: <?= $trailerreviewsCount ?> |
    Support: <?= $supportquestionsCount ?> |
    Contacts: <?= $contactCount ?>
  </div>

  <div class="dashboard-heading">
  <img src="img/MAIN2.PNG" alt="Logo" style="height: 100px; vertical-align: middle; margin-right: 10px;" />
  Admin Dashboard
</div>
  <div class="welcome">Welcome, <strong><?= htmlspecialchars($_SESSION['admin_username']) ?></strong>!</div>

  <!-- 🧙 Center-Aligned Admin Box Without Email -->
<div style="
  width: 350px;
  margin: 20px auto;
  padding: 20px;
  border-radius: 14px;
  background: rgba(130, 8, 8, 0.8);
  color: #ffeb99;
  box-shadow: 0 0 18px rgba(255, 0, 0, 0.61);
  backdrop-filter: blur(10px);
  font-size: 1rem;
  text-align: center;
  border: 1px solid rgba(255, 255, 255, 0.1);
  transition: 0.3s ease;
"
onmouseover="this.style.background='rgba(58, 4, 4, 0.98)';"
onmouseout="this.style.background='rgba(107, 12, 12, 0.8)';"
>
  <h5 style="color: gold; margin-bottom: 10px;">🧙 Admin Info</h5>
  <p style="margin: 6px 0;"><strong>Username:</strong><br> <?= $_SESSION['admin_username'] ?></p>
  <p style="margin: 6px 0;"><strong>Logged in since:</strong><br>
<?= date("d M Y, h:i A", isset($_SESSION['login_time']) ? strtotime($_SESSION['login_time']) : time()) ?>
</p>

</div>
<br>
<h2 style="
  text-align: center;
  font-size: 2rem;
  color: gold;
  text-shadow: 2px 2px 5px #000;
  margin-bottom: 10px; /* was 30px before */
  padding-bottom: 0px;
  font-family: 'Cinzel', serif;
">
  ⚔️ Manage The Realm 
</h2>

<div class="admin-scroll">
  <div class="admin-buttons">
   <ul>
    <li><a href="manage_episodes.php">📖 Manage Episodes</a></li>
    <li><a href="manage_characters.php">🧝 Manage Characters</a></li>
    <li><a href="manage_games.php">🎮 Manage Games</a></li>
    <li><a href="manage_gallery.php">🖼️ Manage Gallery</a></li>
    <li><a href="manage_support_questions.php">💬 Manage Support Questions</a></li>
    <li><a href="manage_reviews.php">⭐ Manage Reviews</a></li>
    <li><a href="manage_trailer_review.php">🎬 Manage Trailer Review</a></li>
    <li><a href="view_contacts.php">📬 View Contact Messages</a></li>
  </ul>
 
  </div>
</div>


  

  
  <h2 class="stats-heading">📊 Realm Activity Charts</h2>

<div class="chart-wrapper">
  <!-- 🔵 Line Chart -->
  <div class="chart-box">
    <canvas id="statsChart"></canvas>
  </div>

  <!-- ⭐ Pie Chart -->
  <div class="chart-box">
    <canvas id="reviewPieChart"></canvas>
  </div>
</div>
<br>


  <!-- 🎯 Scripts -->
<script>
  // 🔵 Realm Activity Chart
  const ctx1 = document.getElementById('statsChart').getContext('2d');
  new Chart(ctx1, {
    type: 'line',
    data: {
      labels: ['Episodes', 'Characters', 'Games', 'Gallery', 'Reviews', 'Trailer_Review', 'Support_Questions', 'Contacts'],
      datasets: [
        {
          label: '🟢 Active',
          data: [<?= $episodeCount ?>, <?= $characterCount ?>, <?= $gameCount ?>, <?= $galleryCount ?>, <?= $reviewCount ?>, <?= $trailerreviewsCount ?>, <?= $supportquestionsCount ?>, <?= $contactCount ?>],
          borderColor: '#00ff88',
          backgroundColor: 'rgba(0, 255, 136, 0.2)',
          borderWidth: 3,
          tension: 0.4,
          pointBackgroundColor: 'lime',
          pointRadius: 5,
        },
        {
          label: '🔴 Deleted',
          data: [<?= $episodeDeleted ?>, <?= $characterDeleted ?>, <?= $gameDeleted ?>, <?= $galleryDeleted ?>, <?= $reviewDeleted ?>, <?= $trailerreviewsDeleted ?>, <?= $supportquestionsDeleted ?>, <?= $contactDeleted ?>],
          borderColor: '#ff4444',
          backgroundColor: 'rgba(255, 0, 0, 0.2)',
          borderWidth: 3,
          tension: 0.4,
          pointBackgroundColor: 'red',
          pointRadius: 5,
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          labels: {
            color: '#ffd700',
            font: { size: 14 }
          }
        }
      },
      scales: {
        y: {
          ticks: { color: '#fff' },
          grid: { color: 'rgba(255,255,255,0.1)' }
        },
        x: {
          ticks: { color: '#fff' },
          grid: { color: 'rgba(255,255,255,0.1)' }
        }
      }
    }
  });

  // ⭐ Review Pie Chart
const ctx2 = document.getElementById('reviewPieChart').getContext('2d');
new Chart(ctx2, {
  type: 'pie',
  data: {
    labels: ['1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars', 'Deleted'],
    datasets: [{
      data: [
        <?= $ratingCounts[1] ?>,
        <?= $ratingCounts[2] ?>,
        <?= $ratingCounts[3] ?>,
        <?= $ratingCounts[4] ?>,
        <?= $ratingCounts[5] ?>,
        <?= $deletedCount ?> // 👈 This is the deleted reviews count
      ],
      backgroundColor: [
        '#484646ff',  // 1 Star - red
        '#ff9933',  // 2 Star - orange
        '#ffff66',  // 3 Star - yellow
        '#cc8533ff',  // 4 Star - lime
        '#eb5d20ff',  // 5 Star - green
        '#990d0dff'   // Deleted - gray
      ],
      borderColor: '#111',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'bottom',
        labels: {
          color: '#fff',
          font: { family: 'Cinzel', size: 14 }
        }
      },
      tooltip: {
        callbacks: {
          label: function(context) {
            const label = context.label || '';
            const value = context.raw || 0;
            return `${label}: ${value} vote${value !== 1 ? 's' : ''}`;
          }
        }
      }
    }
  }
});

</script>
<?php
include ('admin_footer.php');
?>

</body>
</html>
