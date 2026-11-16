<?php
include('auth.php');
include('db.php');

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$search_sql = $search ? "WHERE (your_name LIKE '%$search%' OR your_email LIKE '%$search%' OR subject LIKE '%$search%' OR your_message LIKE '%$search%')" : '';

$sql = "SELECT * FROM contact $search_sql ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Contacts - Loop of Legends</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- ✅ Favicon Line Added -->
  <link rel="icon" type="image/png" href="img/mainlogo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
    text-align: center;
  }

  .magic-btn:hover {
    background: gold;
    color: black;
    transform: scale(1.05);
    box-shadow: 0 0 15px gold;
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

  .table-container {
    overflow-x: auto;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(0, 0, 0, 0.4);
    box-shadow: 0 0 12px crimson;
  }

  th, td {
    padding: 12px;
    border-bottom: 1px solid #ff3333;
    color: white;
    vertical-align: top;
    text-align: left;
  }

  th {
    background: #330000;
    color: gold;
  }

  .deleted {
    opacity: 0.5;
    text-decoration: line-through;
  }

  /* 📱 MOBILE RESPONSIVENESS */
  @media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
      display: block;
    }

    thead {
      display: none;
    }

    tr {
      margin-bottom: 15px;
      padding: 12px;
      border: 1px solid crimson;
      background: rgba(0, 0, 0, 0.3);
      border-radius: 8px;
    }

    td {
      padding: 10px;
      position: relative;
    }

    td::before {
      content: attr(data-label);
      font-weight: bold;
      color: gold;
      display: block;
      margin-bottom: 5px;
    }

    .magic-btn {
      width: 100%;
      margin: 6px 0;
      font-size: 0.95rem;
    }

    input[type="text"] {
      width: 90%;
    }
  }
</style>

</head>
<body>

<h1>📩 Manage Contact Messages</h1>

<div class="top-btn">
  <a class="magic-btn" href="dashboard.php">🏠 Back to Dashboard</a>
</div>

<div class="search-bar">
  <form method="GET" action="view_contacts.php">
    <input type="text" name="search" placeholder="🔍 Search by name, email, subj" value="<?= htmlspecialchars($search) ?>">
  </form>
</div>

<div class="table-container">
  <table>
    <tr>
      <th>ID</th>
      <th>User Name</th>
      <th>Email</th>
      <th>Subject</th>
      <th>Message</th>
      <th>Admin Reply</th>
      <th>Received</th>
      <th>Actions</th>
    </tr>

    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
  <tr class="<?= $row['deleted'] ? 'deleted' : '' ?>">
    <td data-label="ID"><?= $row['id'] ?></td>
    <td data-label="User Name"><?= htmlspecialchars($row['your_name']) ?></td>
    <td data-label="Email"><?= htmlspecialchars($row['your_email']) ?></td>
    <td data-label="Subject"><?= htmlspecialchars($row['subject']) ?></td>
    <td data-label="Message"><?= nl2br(htmlspecialchars($row['your_message'])) ?></td>
    <td data-label="Admin Reply"><?= nl2br(htmlspecialchars($row['admin_reply'])) ?: '<span style="color:gray;">No reply yet</span>' ?></td>
    <td data-label="Received"><?= $row['created_at'] ?></td>
    <td data-label="Actions">
      <?php if (!$row['deleted']): ?>
        <a class="magic-btn" href="reply_contact.php?id=<?= $row['id'] ?>">
          <?= empty($row['admin_reply']) ? '📨 Reply' : '✏️ Edit Reply' ?>
        </a>
        <a class="magic-btn" href="delete_contact.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this contact message?');">🗑️ Delete</a>
      <?php else: ?>
        <a class="magic-btn" style="background: royalblue;" href="restore_contact.php?id=<?= $row['id'] ?>">♻️ Restore</a>
      <?php endif; ?>
    </td>
  </tr>
<?php endwhile; ?>

    <?php else: ?>
      <tr><td colspan="8">No contact messages found.</td></tr>
    <?php endif; ?>
  </table>
</div>

</body>
</html>
