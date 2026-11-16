<?php 
include('db.php');

// ✅ Show only non-deleted reviews + admin reply
$sql = "SELECT id, user_name, rating, your_message, admin_reply 
        FROM reviews 
        WHERE deleted = 0 
        ORDER BY created_at DESC 
        LIMIT 5";
$result = $conn->query($sql);

// ✅ Main container
echo "<div style='
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  padding: 20px;
'>";

// ✅ Check if reviews exist
if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    // ✨ Process data safely
    $review_id   = (int)$row['id'];
    $user_name   = !empty($row['user_name']) ? htmlspecialchars($row['user_name']) : 'Anonymous';
    $rating      = max(0, min(5, (int)$row['rating'])); // Clamp rating between 0-5
    $your_message = htmlspecialchars($row['your_message']);
    $admin_reply  = !empty($row['admin_reply']) ? nl2br(htmlspecialchars($row['admin_reply'])) : null;
    
    // ⭐ Generate star display
    $stars = str_repeat("⭐", $rating) . str_repeat("☆", 5 - $rating);

    // 🔥 Output card
    echo "
    <div style='
      width: 250px;
      height: auto;
      min-height: 270px;
      background: radial-gradient(circle at top left, #1a001a, #330033);
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(220, 20, 60, 0.4);
      border: 2px solid crimson;
      color: #fff;
      font-family: Cinzel, serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    ' 
    onmouseover=\"this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(220,20,60,0.6)';\" 
    onmouseout=\"this.style.transform='scale(1)'; this.style.boxShadow='0 4px 20px rgba(220,20,60,0.4)';\" 
    >

      <!-- ⭐ Star Rating -->
      <div style='font-size: 1.4rem; color: gold;'>$stars</div>

      <!-- 💬 Message -->
      <div style='flex-grow: 1; display: flex; align-items: center; justify-content: center; padding: 10px;'>
        <p style='margin: 0; font-size: 0.95rem; line-height: 1.4;'>“ $your_message ”</p>
      </div>

      <!-- 👤 User Name -->
      <div style='font-size: 0.9rem; font-weight: bold; color: #ffcccc;'>~ $user_name</div>";

      // 🔔 Admin Reply (Only if exists)
      if ($admin_reply) {
        echo "
        <div style='
          margin-top: 12px;
          padding: 10px;
          background: rgba(255, 215, 0, 0.1);
          border-left: 3px solid gold;
          border-radius: 8px;
          font-size: 0.85rem;
          color: #ffd700;
          font-style: italic;
        '>
          🔔 <strong>Admin Reply:</strong><br>
          $admin_reply
        </div>";
      }


    echo "</div>";
  }
} else {
  // ❗ No reviews message
  echo "<p style='color: gray; text-align: center; font-family: Cinzel, serif;'>No reviews yet. Be the first to share!</p>";
}

$conn->close();
?>  
