<?php
include("db.php");

// Search Filter
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$where = "WHERE your_name LIKE '%$search%' OR email LIKE '%$search%' OR question LIKE '%$search%'";

// Fetch data including soft-deleted ones
$sql = "SELECT * FROM support_questions $where ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    mysqli_query($conn, "UPDATE support_questions SET deleted = 1 WHERE id = $id");
    header("Location: manage_support_questions.php");
    exit;
}

// Handle Restore
if (isset($_GET['restore_id'])) {
    $id = intval($_GET['restore_id']);
    mysqli_query($conn, "UPDATE support_questions SET deleted = 0 WHERE id = $id");
    header("Location: manage_support_questions.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <title>📬 Manage Support Questions</title>
  <style>
    body {
      background: linear-gradient(to bottom right, #1a0000, #330000);
      font-family: 'Cinzel', serif;
      color: #ffd700;
      padding: 20px;
    }

    h1 {
      text-align: center;
      text-shadow: 0 0 10px crimson, 0 0 25px gold;
      margin-bottom: 20px;
    }

    .top-btn {
      text-align: center;
      margin-bottom: 25px;
    }

    .magic-btn {
      background: linear-gradient(to right, #7a0000, #ff0000);
      color: white;
      font-weight: bold;
      padding: 10px 20px;
      margin: 6px;
      border-radius: 30px;
      border: 2px solid crimson;
      text-decoration: none;
      box-shadow: 0 0 10px crimson;
      transition: all 0.3s ease;
      display: inline-block;
    }

    .magic-btn:hover {
      background: gold;
      color: black;
      transform: scale(1.05);
      box-shadow: 0 0 15px gold;
    }

    .table-container {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 720px;
      background: rgba(0, 0, 0, 0.4);
      box-shadow: 0 0 12px crimson;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #ff3333;
      color: white;
      vertical-align: top;
    }

    th {
      background: #330000;
      color: gold;
    }

    .deleted {
      opacity: 0.5;
      text-decoration: line-through;
    }

    .search-bar {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"] {
      padding: 8px 14px;
      border-radius: 25px;
      border: 1px solid crimson;
      width: 280px;
      font-family: 'Cinzel', serif;
      font-size: 1rem;
      background: #1a0000;
      color: #ffd700;
      box-shadow: 0 0 8px crimson;
    }

    @media (max-width: 768px) {
      table {
        min-width: unset;
      }
      .magic-btn {
        padding: 8px 12px;
        font-size: 0.9rem;
      }
      input[type="text"] {
        width: 90%;
      }
    }
  </style>
</head>
<body>

<h1>🛠 Manage Support Questions</h1>

<div class="top-btn">
  <a class="magic-btn" href="dashboard.php">🏠 Back to Dashboard</a>
</div>


<div class="search-bar">
  <form method="GET" action="manage_support_questions.php">
    <input type="text" name="search" placeholder="🔍 Search by name, email, subj" value="<?= htmlspecialchars($search) ?>">
  </form>
</div>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Question</th>
      <th>Reply</th>
      <th>Created</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

<?php if ($result && $result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr class="<?= $row['deleted'] ? 'deleted' : '' ?>">
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['your_name']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['question']) ?></td>
          <td><?= nl2br(htmlspecialchars($row['reply'])) ?: '<span style="color:gray;">No reply yet</span>' ?></td>
          <td><?= $row['created_at'] ?></td>
          <td>
            <?php if (!$row['deleted']): ?>
              <a class="magic-btn" href="reply_support_question.php?id=<?= $row['id'] ?>">
  <?= empty($row['reply']) ? '📨 Reply' : '✏️ Edit Reply' ?>
</a>
              <a class="magic-btn" href="delete_support_question.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this contact message?');">🗑️ Delete</a>
            <?php else: ?>
              <a class="magic-btn" style="background: royalblue;" href="restore_support_question.php?id=<?= $row['id'] ?>">♻️ Restore</a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="7">No records found.</td></tr>
    <?php endif; ?>

      </tbody>
</table>

</body>
</html>
