
<?php
include('header.php');
include('db.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $subject = isset($_POST['subject']) ? $conn->real_escape_string($_POST['subject']) : null;
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact (your_name, your_email, subject, your_message)
            VALUES ('$name', '$email', " . ($subject ? "'$subject'" : "NULL") . ", '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Message sent successfully!'); window.location.href='contact.php';</script>";
    } else {
        echo "<script>alert('❌ Error: " . addslashes($conn->error) . "'); window.location.href='contact.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>📨 Contact- Loop of Legends</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    
    body {
      background-color: #000;
      color: #fff;
      font-family: 'Cinzel', serif;
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

body {
  padding-top: 90px;
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

</style>
<body>

<!-- 📨 Contact Section -->
<section id="contact" class="section-padding" style="padding: 80px 20px;">
  <div class="container">

    <!-- ✨ Animated Heading -->
    <h2 class="text-center mb-4 typewriter-heading" style="
      font-family: 'Cinzel', serif;
      font-size: 2.3rem;
      color: crimson;
      text-shadow: 0 0 10px rgba(255, 0, 0, 0.8), 0 0 20px rgba(255, 0, 0, 0.6);
    ">
      📨 <span id="contactTypewriter"></span>
    </h2>

    <p class="text-center mb-5" style="opacity: 0.85; max-width: 600px; margin: 0 auto; font-size: 1rem;">
      Send your message through the enchanted scroll. We respond to worthy allies only!
    </p>

    <!-- 🧙 Form -->
    <form class="contact-form mx-auto" style="max-width: 600px;" action="contact.php" method="post">

      <!-- Name -->
      <div class="form-floating mb-4">
        <input type="text" class="form-control contact-input" name="name" id="floatingName" placeholder="Your Name" required>
        <label for="floatingName">🧙 Your Name</label>
      </div>

      <!-- Email -->
      <div class="form-floating mb-4">
        <input type="email" class="form-control contact-input" name="email" id="floatingEmail" placeholder="Your Email" required>
        <label for="floatingEmail">📧 Your Email</label>
      </div>

      <!-- Subject (changed to input type="text") -->
      <div class="form-floating mb-4">
        <input type="text" class="form-control contact-input" name="subject" id="floatingSubject" placeholder="Your Subject">
        <label for="floatingSubject">📌 Subject</label>
      </div>

      <!-- Message -->
      <div class="form-floating mb-4">
        <textarea class="form-control contact-input" placeholder="Your Message" name="message" id="floatingMessage" style="height: 150px;" required></textarea>
        <label for="floatingMessage">💬 Your Message</label>
      </div>

      <!-- Button -->
      <div class="text-center mt-4">
        <button type="submit" class="btn contact-btn shadow-dragon glow-on-hover">
          🔥 Send Message
        </button>
      </div>

    </form>
  </div>
</section>

<!-- ✨ Typewriter Script -->
<script>
  const text = "Contact the Realm";
  let i = 0;
  const speed = 100;
  function typeWriter() {
    if (i < text.length) {
      document.getElementById("contactTypewriter").innerHTML += text.charAt(i);
      i++;
      setTimeout(typeWriter, speed);
    }
  }
  window.onload = typeWriter;
</script>

<!-- 🎨 Extra Styling -->
<style>
  .contact-input {
    background-color: #1c0a1c;
    color: white;
    border: 1px solid crimson;
    box-shadow: 0 0 8px rgba(255, 0, 0, 0.4);
  }

  .contact-input::placeholder {
    color: #aaa;
  }

  .contact-input:focus {
    border-color: #ff4d4d;
    box-shadow: 0 0 10px #ff4d4d;
    background-color: #2b0d2b;
  }

  .contact-btn {
    padding: 12px 28px;
    font-size: 1.1rem;
    background: linear-gradient(to right, #800000, #ff0000);
    color: white;
    border: none;
    border-radius: 30px;
    transition: all 0.3s ease-in-out;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 0 15px #ff4d4d;
  }

  .glow-on-hover:hover {
    box-shadow: 0 0 25px #ff4d4d, 0 0 40px #ff4d4d;
    transform: scale(1.05);
  }

  @media (max-width: 576px) {
    .contact-btn {
      font-size: 1rem;
      padding: 10px 22px;
    }

    .typewriter-heading {
      font-size: 1.8rem !important;
    }
  }
</style>
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

