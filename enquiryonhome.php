<?php
include('db.php');

$sql = "SELECT your_name, your_email, subject, your_message, created_at FROM contact ORDER BY created_at DESC LIMIT 4";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $bgImages = [
        "img/box1.jpg",
        "img/box2.jpg",
        "img/box3.jpg",
        "img/box4iv.jpg"
    ];

    echo '<section id="recent-enquiries" style="padding: 70px 200px; background-color: transparent; color: #fff;">';
    echo '<div class="container">';
    echo '<h3 class="text-center mb-5 fw-bold typewriter-enquiry" style="font-family: Cinzel, serif; font-size: 2rem;">
        📬 <span id="recentTypewriter"></span>
    </h3>';
    echo '<div class="row justify-content-center">';

    $index = 0;
    while ($row = $result->fetch_assoc()) {
        $bgImage = $bgImages[$index % count($bgImages)];
        $message = htmlspecialchars($row['your_message'], ENT_QUOTES); // protect JS injection

        echo '<div class="col-md-6 mb-4">';
        echo '<div class="enquiry-card" style="--bg-image: url(' . $bgImage . ');">';
        echo '<h5 style="color: #ff4d4d;">' . htmlspecialchars($row['your_name']) . '</h5>';
        echo '<p><strong>Email:</strong> ' . htmlspecialchars($row['your_email']) . '</p>';
        if (!empty($row['subject'])) {
            echo '<p><strong>Subject:</strong> ' . htmlspecialchars($row['subject']) . '</p>';
        }

        echo '<div>';
        echo '<button class="btn btn-sm btn-outline-danger scroll-btn" data-message="' . $message . '">📜 View More</button>';
        echo '</div>';

        echo '<small class="text-muted">📅 ' . date("F j, Y, g:i a", strtotime($row['created_at'])) . '</small>';
        echo '</div>';
        echo '</div>';

        $index++;
    }

    echo '</div></div></section>';

    // Enquire Button
    echo '<div class="text-center" style="margin-top: -30px; padding-bottom: 50px;">';
    echo '<a href="contact.php" class="btn" style="
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
    onmouseover="this.style.transform=\'scale(1.1)\'; this.style.boxShadow=\'0 0 18px #ff5c5c\';"
    onmouseout="this.style.transform=\'scale(1)\'; this.style.boxShadow=\'0 0 12px #ff4c4c90\';">
    🪄 Enquire
    </a>';
    echo '</div>';

    // 📜 Message Popup HTML
    echo '
    <div id="messagePopup" class="scroll-popup" style="display: none;">
      <div class="scroll-content">
        <span id="closePopup">❌</span>
        <div class="scroll-top"></div>
        <div id="popupText" class="popup-message"></div>
        <div class="scroll-bottom"></div>
      </div>
    </div>';
} else {
    echo '<div class="text-center text-muted">No enquiries yet.</div>';
}
?>

<!-- ✅ Styles -->
<style>
.typewriter-enquiry {
  font-weight: bold;
  color: crimson;
  overflow: hidden;
  border-right: 2px solid crimson;
  white-space: nowrap;
  letter-spacing: 2px;
  animation: typing 3s steps(40, end), blink 0.75s step-end infinite;
  max-width: fit-content;
  margin: 0 auto;
}

@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}
@keyframes blink {
  50% { border-color: transparent }
}

.enquiry-card {
  position: relative;
  border: 1px solid crimson;
  padding: 15px;
  border-radius: 12px;
  background-color: transparent;
  box-shadow: 0 0 10px crimson;
  transition: all 0.3s ease-in-out;
  overflow: hidden;
  color: white;
  z-index: 1;
}
.enquiry-card::before {
  content: "";
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background-image: var(--bg-image);
  background-size: cover;
  background-position: center;
  opacity: 0.15;
  z-index: -1;
  animation: float-bg 6s ease-in-out infinite;
}

@keyframes float-bg {
  0%   { transform: translateY(0); }
  50%  { transform: translateY(-8px); }
  100% { transform: translateY(0); }
}
.enquiry-card:hover {
  transform: scale(1.02);
  box-shadow: 0 0 20px crimson;
}

/* 📜 Scroll Popup */
.scroll-popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 9999;
  background: radial-gradient(#4a0000, #1a0000);
  border: 6px solid #c9a063;
  border-radius: 40px;
  box-shadow: 0 0 40px crimson;
  width: 400px;
  max-width: 90%;
  color: #fff;
  padding: 30px;
  font-family: 'Cinzel', serif;
  animation: fadeInScroll 0.4s ease-in-out;
}
.scroll-content {
  position: relative;
}
.scroll-content span#closePopup {
  position: absolute;
  top: -20px;
  right: -20px;
  background: crimson;
  color: white;
  font-size: 1.2rem;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: grid;
  place-items: center;
  cursor: pointer;
  box-shadow: 0 0 10px #ff4d4d;
}
.scroll-top, .scroll-bottom {
  height: 25px;
  background: url('img/MAIN2.png') no-repeat center;
  background-size: contain;
}
.popup-message {
  padding: 10px 0;
  line-height: 1.6;
  font-size: 1rem;
  text-align: justify;
}
@keyframes fadeInScroll {
  from { opacity: 0; transform: translate(-50%, -60%); }
  to   { opacity: 1; transform: translate(-50%, -50%); }
}
</style>

<!-- ✅ Scripts -->
<script>
const recentText = "Recent Enquiries";
let j = 0;
function typeEnquiry() {
  if (j < recentText.length) {
    document.getElementById("recentTypewriter").innerHTML += recentText.charAt(j);
    j++;
    setTimeout(typeEnquiry, 100);
  }
}
window.addEventListener("load", typeEnquiry);

document.addEventListener("DOMContentLoaded", function () {
  const scrollBtns = document.querySelectorAll(".scroll-btn");
  const popup = document.getElementById("messagePopup");
  const popupText = document.getElementById("popupText");
  const closeBtn = document.getElementById("closePopup");

  scrollBtns.forEach(btn => {
    btn.addEventListener("click", function () {
      const message = btn.getAttribute("data-message");
      popupText.innerHTML = "<strong>📜 Message:</strong><br><br>" + message.replace(/\n/g, "<br>");
      popup.style.display = "block";
    });
  });

  closeBtn.addEventListener("click", function () {
    popup.style.display = "none";
  });
});
</script>
