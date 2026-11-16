<?php
include("db.php");

// Check if ID is passed
if (!isset($_GET['id'])) {
    echo "No ID provided.";
    exit;
}

$id = intval($_GET['id']);

// Fetch question
$sql = "SELECT * FROM support_questions WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Question not found.";
    exit;
}

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reply = trim($_POST['reply']);

    $update_sql = "UPDATE support_questions SET reply = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("si", $reply, $id);

    if ($update_stmt->execute()) {
        header("Location: manage_support_questions.php");
        exit;
    } else {
        $error = "Failed to update reply.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <title>✏️ Edit Reply</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background: radial-gradient(circle at center, #1a0000, #330000);
      color: gold;
      font-family: 'Cinzel', serif;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    h2 {
      text-align: center;
      text-shadow: 0 0 10px crimson;
      font-size: 1.8rem;
      margin-bottom: 15px;
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
  </style>
</head>
<body>

<h2><i class="fas fa-envelope"></i> Reply to <?= htmlspecialchars($data['your_name']) ?></h2>

<div class="container">
  <p><strong>📧 Email:</strong> <?= htmlspecialchars($data['email']) ?></p>
  <div class="original"><strong>❓ Question:</strong><br><?= nl2br(htmlspecialchars($data['question'])) ?></div>

  <?php if (!empty($error)): ?>
    <p class="error" style="color:red; text-align:center;"><?= $error ?></p>
  <?php endif; ?>

  <form method="POST">
    <div class="form-group">
      <label for="reply"><i class="fas fa-scroll"></i> Your Reply:</label>
      <textarea name="reply" id="reply" placeholder="Type your reply here..." required><?= htmlspecialchars($data['reply'] ?? '') ?></textarea>
    </div>
    <div class="btn-container">
      <input type="submit" value="✉️ Save Reply">
    </div>
  </form>
</div>

<div class="back">
  <a href="manage_support_questions.php">← Back to List</a>
</div>

</body>
</html>


