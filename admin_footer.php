<style>
  body, html {
    margin: 0;
    padding: 0;
    background-color: #180000; /* Match footer background */
  }

  footer.admin-footer {
    background: #180000;
    color: #ffd700;
    font-family: 'Cinzel', serif;
    padding: 30px 0 10px;
    width: 100%;
    box-shadow: inset 0 0 20px #660000;
  }

  .footer-content {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    flex-wrap: wrap;
    margin: 0;
    padding: 0 20px;
    width: 100%;
    box-sizing: border-box;
  }

  .footer-column {
    flex: 1;
    min-width: 220px;
    margin: 10px 0;
  }

  .footer-column img {
    height: 60px;
    margin-bottom: 10px;
    filter: drop-shadow(0 0 6px gold);
  }

  .footer-column h4, .footer-column h5 {
    color: gold;
    margin-bottom: 8px;
  }

  .footer-column p {
    font-size: 0.85rem;
    color: #ffcc99;
    line-height: 1.4;
    margin: 0;
  }

  .footer-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .footer-column li {
    margin-bottom: 6px;
  }

  .footer-column a {
    text-decoration: none;
    color: #fff2e6;
    font-size: 0.85rem;
    padding: 6px 10px;
    display: inline-block;
    background: #2b0000;
    border-left: 3px solid crimson;
    border-radius: 8px;
    transition: all 0.2s ease;
    box-shadow: 0 0 6px #660000;
  }

  .footer-column a:hover {
    background: #4d0000;
    color: gold;
    box-shadow: 0 0 10px #ff4444;
    transform: scale(1.03);
  }

  .footer-bottom {
    text-align: center;
    font-size: 0.8rem;
    color: #aa8855;
    margin-top: 20px;
    padding: 10px 0 5px;
    border-top: 1px solid #330000;
  }
  .hover-logo {
  transition: transform 0.4s ease, filter 0.4s ease;
  cursor: pointer;
}

.hover-logo:hover {
  transform: scale(1.15) rotate(3deg);
  filter: drop-shadow(0 0 12px gold) brightness(1.2);
}

</style>

<footer class="admin-footer">
  <div class="footer-content">
    <!-- Logo & Info -->
    <div class="footer-column">
      <img src="img/mainlogo.png" alt="Logo" class="hover-logo">
      <h4>Admin Panel</h4>
      <p>
        The Admin Panel is the command center of Loop of Legends. Here, you manage characters, quests, episodes, and more. Keep the fantasy realm alive!
      </p>
    </div>

    <!-- Quick Links -->
    <div class="footer-column">
      <h5>🧭 Quick Links</h5>
      <ul>
        <li><a href="manage_episodes.php">📖 Manage Episodes</a></li>
        <li><a href="manage_characters.php">🧝 Manage Characters</a></li>
        <li><a href="manage_games.php">🎮 Manage Games</a></li>
        <li><a href="manage_gallery.php">🖼️ Manage Gallery</a></li>
        <li><a href="manage_reviews.php">⭐ Manage Reviews</a></li>
        <li><a href="manage_trailer_review.php">🎬 Manage Trailer Review</a></li>
      </ul>
    </div>

    <!-- Useful Links -->
    <div class="footer-column">
      <h5>🔗 Useful Links</h5>
      <ul>
        <li><a href="view_contacts.php">📬 View Contacts</a></li>
        <li><a href="manage_support_questions.php">💬 Support Questions</a></li>
        <li><a href="mailto:loopoflegends@gmail.com">✉️ loopoflegends@gmail.com</a></li>
        <li><a href="admin-register.php">➕ Register New Admin</a></li>
        <li><a href="admin_logout.php" style="
      display: inline-block;
      padding: 12px 25px;
      background: linear-gradient(to right, #a20f0fff, #a00b0b50);
      color: white;
      font-weight: bold;
      font-size: 1rem;
      border-radius: 12px;
      text-decoration: none;
      font-family: 'Cinzel', serif;
      box-shadow: 0 0 15px gold;
      transition: 0.3s;
    " onmouseover="this.style.transform='scale(1.06)'; this.style.boxShadow='0 0 25px gold';"
       onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 15px gold';">
      🔓 Logout
    </a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    © <?= date('Y') ?> Loop of Legends. All rights reserved. | Crafted for Legendary Admins 🛡️
  </div>
</footer>
