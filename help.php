<?php include ('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>🛠️ Help & Support | Loop of Legends</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
  body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    margin: 0;
    font-family: 'Cinzel', serif;
    background: radial-gradient(circle, #0a0a0a 0%, #1a001a 100%);
    color: #fff;
  }

  .container {
    flex: 1;
    padding-top: 80px;
    padding-bottom: 40px;
  }

  .page-title {
    text-align: center;
    font-size: 2rem;
    color: crimson;
    margin-bottom: 20px;
    text-shadow: 0 0 8px crimson;
  }

  .accordion-button {
    background-color: #1a001a;
    color: crimson;
    font-size: 0.95rem;
    padding: 10px 16px;
  }

  .accordion-item {
    background: #120012;
    border: 1px solid crimson;
    border-radius: 6px;
    margin-bottom: 12px;
  }

  .accordion-body {
    font-size: 0.9rem;
    color: #eee;
    animation: fadeInUp 0.4s ease forwards;
  }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .form-section {
    margin-top: 40px;
    padding: 25px 30px;
    background: #120012;
    border: 1.5px solid crimson;
    border-radius: 12px;
    box-shadow: 0 0 12px crimson;
  }

  .form-label { color: #ddd; font-size: 0.9rem; }
  .form-control {
    background-color: #1c0c1c;
    color: #fff;
    border: 1px solid #444;
    font-size: 0.9rem;
    padding: 8px 12px;
  }

  .form-control::placeholder { color: #888; }

  .btn-submit {
    background-color: crimson;
    color: white;
    border: none;
    padding: 10px 24px;
    border-radius: 30px;
    font-size: 1rem;
    margin-top: 10px;
  }

  .btn-submit:hover {
    background-color: #cc0033;
    box-shadow: 0 0 12px crimson;
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

    .footer-links a { color: #ff9999; text-decoration: none; }
    .footer-links a:hover { text-decoration: underline; }

    .footer-brand { font-weight: bold; color: crimson; font-size: 1.2rem; }

    .footer-legal a {
      color: #ff7777;
      font-weight: 500;
      text-decoration: none;
    }
    .footer-legal a:hover { text-decoration: underline; }

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

<div class="container">
  <h1 class="page-title">🛠️ Help & Support</h1>

  <!-- ❓ FAQ Section -->
    <h4 class="mb-3 text-light">Frequently Asked Questions</h4>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
            How do I start playing Loop of Legends?
          </button>
        </h2>
        <div id="faqCollapse1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-light">
            Head to the Home page and click on “Begin Journey.” You can explore episodes and characters from there!
          </div>
        </div>
      </div>

      <div class="accordion-item">
  <h2 class="accordion-header" id="faq2">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
      Is this just a fantasy story or an actual game?
    </button>
  </h2>
  <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
    <div class="accordion-body text-light">
      It’s a fully interactive fantasy game! You’ll uncover secrets, unlock realms, and make story-altering choices as you explore the enchanted world.
    </div>
  </div>
</div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
            Can I replay episodes or games?
          </button>
        </h2>
        <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-light">
            Yes! You can revisit any episode or game anytime and discover alternate paths and challenges.
          </div>
        </div>
      </div>
    </div>

  <!-- Form -->
  <div class="form-section">
    <h4 class="mb-3 text-light">Still need help? Ask us anything!</h4>
    <form id="supportForm">
      <div class="mb-3">
        <label class="form-label">Your Name</label>
        <input type="text" name="your_name" class="form-control" placeholder="Enter your name" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Your Question</label>
        <textarea name="question" class="form-control" rows="4" placeholder="Type your question here..." required></textarea>
      </div>
      <button type="submit" id="submitBtn" class="btn" style="
    padding: 10px 26px;
    background: linear-gradient(to right, #800000, #ff0000);
    color: white;
    font-weight: bold;
    border-radius: 30px;
    font-size: 1.05rem;
    box-shadow: 0 0 12px #ff3b3b99;
  ">
    📨 Submit
  </button>

    </form>
  </div>
</div>

<?php include ('footer.php') ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // 🎯 Auto-close FAQ accordions on focus in form
  const formInputs = document.querySelectorAll('#supportForm input, #supportForm textarea');

  formInputs.forEach(input => {
    input.addEventListener('focus', () => {
      const openedItems = document.querySelectorAll('.accordion-collapse.show');
      openedItems.forEach(item => {
        const instance = bootstrap.Collapse.getInstance(item);
        if (instance) instance.hide();
      });
    });
  });
  const form = document.getElementById("supportForm");
  const submitBtn = document.getElementById("submitBtn");

  form.addEventListener("submit", function(e){
    e.preventDefault();
    submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>Sending...`;
    submitBtn.disabled = true;

    fetch("submit help.php", {
      method: "POST",
      body: new FormData(form)
    })
    .then(res => res.text())
    .then(res => {
      if(res.trim() === "success"){
        alert("✅ Thank you! Your question has been received.");
        form.reset();
      } else {
        alert("❌ Something went wrong.");
        console.error(res);
      }
      submitBtn.innerHTML = "📨 Submit";
      submitBtn.disabled = false;
    })
    .catch(err => {
      alert("❌ Network error.");
      console.error(err);
      submitBtn.innerHTML = "📨 Submit";
      submitBtn.disabled = false;
    });
  });
</script>
</body>
</html>
