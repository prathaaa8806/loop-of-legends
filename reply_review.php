<?php
include('auth.php');
include('db.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Invalid Contact ID");
}

$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM reviews WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
  die("Reviews not found");
}

$row = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $reply = trim($_POST['reply']);

  if (!empty($reply)) {
    $stmt = $conn->prepare("UPDATE reviews SET admin_reply = ? WHERE id = ?");
    $stmt->bind_param("si", $reply, $id);
    $stmt->execute();
    echo "<script>alert('Reply saved for: " . $row['user_name'] . "'); window.location.href='manage_reviews.php';</script>";
    exit();
  } else {
    $error = "Reply message cannot be empty.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reply Reviews - Loop of Legends</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    body {
      margin: 0;
      padding: 20px 0 40px 0;
      background: radial-gradient(circle at center, #1a0000, #330000);
      color: gold;
      font-family: 'Cinzel', serif;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h2 {
      text-align: center;
      text-shadow: 0 0 10px crimson;
      font-size: 1.8rem;
      margin-top: 40px;
      margin-bottom: 25px;
    }

    .container {
      width: 90%;
      max-width: 650px;
      background: rgba(0, 0, 0, 0.6);
      padding: 25px;
      border: 2px solid crimson;
      border-radius: 18px;
      box-shadow: 0 0 22px crimson;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: gold;
      font-size: 1rem;
      text-shadow: 0 0 5px crimson;
      letter-spacing: 0.5px;
    }

    textarea {
      width: 100%;
      height: 150px;
      border-radius: 12px;
      border: 2px solid crimson;
      padding: 12px;
      background: #1a0000;
      color: white;
      font-family: 'Cinzel', serif;
      resize: vertical;
      font-size: 1rem;
      box-sizing: border-box;
    }

    textarea::placeholder {
      color: #888;
      letter-spacing: 0.5px;
      font-style: italic;
    }

    input[type="submit"] {
      background: linear-gradient(to right, #ff4d00, #990000);
      color: white;
      border: none;
      padding: 12px 30px;
      margin-top: 25px;
      font-weight: bold;
      border-radius: 30px;
      box-shadow: 0 0 15px crimson;
      cursor: pointer;
      font-size: 1rem;
      transition: 0.3s ease-in-out;
    }

    input[type="submit"]:hover {
      background: gold;
      color: black;
      box-shadow: 0 0 20px gold;
      transform: scale(1.06);
    }

    .back {
      text-align: center;
      margin-top: 25px;
    }

    .back a {
      color: crimson;
      text-decoration: none;
      font-size: 1rem;
      transition: 0.3s;
    }

    .back a:hover {
      text-decoration: underline;
      color: white;
    }

    .original {
      background: rgba(255, 255, 255, 0.06);
      padding: 15px;
      border-left: 4px solid crimson;
      margin-top: 10px;
      border-radius: 8px;
      color: #ffccaa;
    }

    .error {
      color: red;
      font-weight: bold;
      text-align: center;
      margin-top: 10px;
    }

    .form-group {
      margin-top: 30px;
      text-align: left;
      width: 100%;
    }
    
    .btn-container {
      text-align: center;
      margin-top: 25px;
    }

    @media (max-width: 600px) {
      h2 {
        font-size: 1.5rem;
        margin-top: 80px;
      }

      .container {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

<h2><i class="fas fa-envelope"></i> Reply to <?= htmlspecialchars($row['user_name']) ?></h2>

<div class="container">
  <p><strong>Ratings:</strong> <?= htmlspecialchars($row['rating']) ?></p>
  <div class="original"><strong>Message:</strong><br><?= nl2br(htmlspecialchars($row['your_message'])) ?></div>

  <?php if (!empty($error)): ?>
    <p class="error"><?= $error ?></p>
  <?php endif; ?>

  <form method="POST">
    <div class="form-group">
      <label for="reply"><i class="fas fa-scroll"></i> Your Reply:</label>
      <textarea name="reply" placeholder="Type your reply here..." required><?= htmlspecialchars($row['admin_reply'] ?? '') ?></textarea>
    </div>
    <div class="btn-container">
      <input type="submit" value="✉️ Save Reply">
    </div>
  </form>
</div>

<div class="back">
  <a href="view_contacts.php">← Back to Contact List</a>
</div>

</body>
</html>
