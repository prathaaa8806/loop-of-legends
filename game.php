<?php 
include ('header.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>🎮 Games- Loop of Legends</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Game -->
<section id="game" class="game-section">
  <div class="container py-5" style="position: relative;"> <!-- 👈 Important -->
  
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: 'Cinzel', serif;
    }
   
    .instruction-overlay {
      position: absolute;
      top: 0;
      right: 0;
      z-index: 10;
      background: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(8px);
      color: white;
      padding: 15px 25px;
      border-radius: 15px;
      box-shadow: 0 0 15px crimson;
      animation: fadeIn 0.5s ease-in-out;
      transition: opacity 0.4s ease;
      max-width: 300px;
      font-size: 14px;
      text-align: center;
    }

    .instruction-overlay button {
      margin-top: 10px;
      background: transparent;
      border: 1px solid white;
      padding: 5px 15px;
      color: white;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
    }

    .instruction-overlay button:hover {
      background-color: crimson;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
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

/* ✅ Fix Images on Mobile */
img, iframe, video {
  max-width: 100%;
  height: auto;
  display: block;
}

body {
  padding-top: 90px;
}

  </style>
</head>
<body>

  <!-- Game Instructions -->
  <div id="LearnInstructions" class="instruction-overlay">
    <p>🧠 <strong>Instructions:</strong><br>
    Select a <strong>Hero</strong> and a <strong>Villain</strong><br>
    Answer the question<br>
    <span style="color:lightgreen;">Correct?</span> Villain blasts 💥<br>
    <span style="color:#ff4c4c;">Wrong?</span> Hero blasts 💢<br>
    Change both characters next round<br>
    Or you won’t enjoy the battle 😅</p>
    <button onclick="hideLearnInstructions()">Got it!</button>
  </div>

  </div>
</section>

<script>
  function hideLearnInstructions() {
    const box = document.getElementById("LearnInstructions");
    box.style.opacity = "0";
    setTimeout(() => {
      box.remove();
    }, 400);
  }
</script>

    <h1 class="text-center mb-4 dragon-red">🛡️Choose Your Hero</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col">
        <div class="character-card" id="card-Adalia">
          <div class="flip-inner">
            <div class="flip-front">
              <img src="img/Adilia Ember.jpg" alt="Adilia">
            </div>
            <div class="flip-back text-center">
              <h5>Adalia Ember</h5>
              <p>🔥 Flame Knight</p>
              <button class="btn-select" onclick="selectCharacter('Adalia')">Select</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="character-card" id="card-Wyllan">
          <div class="flip-inner">
            <div class="flip-front">
              <img src="img/glac .jpg" alt="Wyllan">
            </div>
            <div class="flip-back text-center">
              <h5>Wyllan Glacia</h5>
              <p>❄️ Frost Mage</p>
              <button class="btn-select" onclick="selectCharacter('Wyllan')">Select</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="character-card" id="card-Falencia">
          <div class="flip-inner">
            <div class="flip-front">
              <img src="img/syli.jpg" alt="Falencia">
            </div>
            <div class="flip-back text-center">
              <h5>Falencia Syliva</h5>
              <p>🌿 Forest Guardian</p>
              <button class="btn-select" onclick="selectCharacter('Falencia')">Select</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="character-card" id="card-Vellius">
          <div class="flip-inner">
            <div class="flip-front">
              <img src="img/zephyr.jpg" alt="Vellius">
            </div>
            <div class="flip-back text-center">
              <h5>Vellius Zephyrus</h5>
              <p>🕊️🗡️ Skyblade</p>
              <button class="btn-select" onclick="selectCharacter('Vellius')">Select</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  <h1 class="text-center my-4 dragon-red">🦹 Choose Your Villain</h1>
<div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
  <div class="col">
    <div class="character-card" id="villain-card-Shadow">
      <div class="flip-inner">
        <div class="flip-front">
          <img src="img/monarch.jpg" alt="Shadow">
        </div>
        <div class="flip-back text-center">
          <h5>Shadow</h5>
          <p>🕶️🗡️ Eclipsion</p>
          <button class="btn-select" onclick="selectVillain('Shadow')">Select</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="character-card" id="villain-card-Night">
      <div class="flip-inner">
        <div class="flip-front">
          <img src="img/widow.jpg" alt="Night">
        </div>
        <div class="flip-back text-center">
          <h5>Night Widow</h5>
          <p>🕸️👑 Lord of the Mindfang</p>
          <button class="btn-select" onclick="selectVillain('Night')">Select</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="character-card" id="villain-card-Void">
      <div class="flip-inner">
        <div class="flip-front">
          <img src="img/void lord.jpg" alt="Void">
        </div>
        <div class="flip-back text-center">
          <h5>Void Lord</h5>
          <p> 🌌🕷️ The Cursebound Lord</p>
          <button class="btn-select" onclick="selectVillain('Void')">Select</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="character-card" id="villain-card-Nyx">
      <div class="flip-inner">
        <div class="flip-front">
          <img src="img/shadow witch.jpg" alt="Nyx">
        </div>
        <div class="flip-back text-center">
          <h5>Nyx</h5>
          <p>🌑 Shadow Witch</p>
          <button class="btn-select" onclick="selectVillain('Nyx')">Select</button>
        </div>
      </div>
    </div>
  </div>
</div>

    <div id="arena">
      <h1 class="text-center mb-4 dragon-red">⚔️ Battle Arena</h1>
      <p>Player: <span id="playerName"></span></p>
      <div class="row mb-3">
        <div class="col-md-6">
          <h5>Player HP</h5>
          <div class="hp-bar" id="playerHp" style="width: 100%;"></div>
        </div>
        <div class="col-md-6">
          <h5>Enemy HP</h5>
          <div class="hp-bar bg-danger" id="enemyHp" style="width: 100%;"></div>
        </div>
      </div>
      <div class="mt-4">
        <h4>💡 Answer to Attack:</h4>
        <p id="questionText"></p>
        <input type="text" id="battleAnswer" class="form-control w-50 mx-auto" placeholder="Your answer here" />
        <button onclick="submitBattleAnswer()" class="btn btn-danger">Attack</button>
        <div id="battleFeedback" class="mt-3"></div>
      </div>
    </div>
    <!-- Sound effect for blast -->
    <audio id="blastSound" src="voice/mixkit-explosion-in-battle-2809.wav" preload="auto"></audio>
    <section id="Game2">
  </section>


  </div>
<script>
const questions = {
  Adalia: [
    { q: '🔥 The Ember Crystal is guarded by a riddle: "I burn without wood, I glow without flame. What am I?"', a: 'Fire' },
    { q: '🌋 The volcano whispers a message only brave hearts hear. What must a hero possess to cross it?', a: 'Courage' }
  ],
  Wyllan: [
    { q: '❄️ In the frozen halls of Glacia, only those who remember the ancient word for ice may pass. What is it?', a: 'Frost' },
    { q: '🧊 A mirror shows your past, but hides your present. What must you trust to survive?', a: 'Instinct' }
  ],
  Falencia: [
    { q: '🌳 The Sylvan Forest speaks in echoes. To find your way, what must you follow?', a: 'Whispers' },
    { q: '🦋 A butterfly flaps its wings, and destiny changes. What is this mysterious force called?', a: 'The Butterfly Effect' }
  ],
  Vellius: [
    { q: '🌑 In the land of Umbra, shadows are alive. What do they fear the most?', a: 'Light' },
    { q: '🕳️ A hero falls into a void of illusions. What is the only way out?', a: 'Truth' }
  ]
};

let selectedCharacter = "";
let selectedVillain = "";
let currentQuestionIndex = 0;
let defeatedVillains = new Set();

function selectCharacter(name) {
  selectedCharacter = name;
  currentQuestionIndex = 0;
  document.getElementById("playerName").textContent = name;
  document.getElementById("arena").style.display = "block";
  document.getElementById("battleFeedback").textContent = "";
  document.getElementById("battleAnswer").value = "";
  document.getElementById("questionText").textContent = selectedVillain
    ? questions[name][currentQuestionIndex].q
    : "Select a villain to begin!";
  document.getElementById("arena").scrollIntoView({ behavior: "smooth" });

  ["Adalia", "Wyllan", "Falencia", "Vellius"].forEach(c => {
    document.getElementById(`card-${c}`).style.opacity = (c === name) ? 1 : 0.5;
  });
}

function selectVillain(name) {
  selectedVillain = name;

  ["Shadow", "Night", "Void", "Nyx"].forEach(c => {
    document.getElementById(`villain-card-${c}`).style.opacity = (c === name) ? "1" : "0.5";
  });

  if (selectedCharacter) {
    document.getElementById("playerName").textContent = selectedCharacter + " vs " + selectedVillain;
    currentQuestionIndex = 0;
    document.getElementById("battleFeedback").textContent = "";
    document.getElementById("battleAnswer").value = "";
    document.getElementById("questionText").textContent = questions[selectedCharacter][currentQuestionIndex].q;
    document.getElementById("arena").style.display = "block";
    document.getElementById("arena").scrollIntoView({ behavior: "smooth" });
  }
}

function submitBattleAnswer() {
  // 🔐 Guard Clause - Don't allow attack unless both are selected and game not over
  if (!selectedCharacter || !selectedVillain || defeatedVillains.size >= 4) {
    return;
  }

  const answer = document.getElementById("battleAnswer").value.trim();
  const expected = questions[selectedCharacter][currentQuestionIndex].a;

  const feedback = document.getElementById("battleFeedback");
  const enemyHp = document.getElementById("enemyHp");
  const playerCard = document.getElementById(`card-${selectedCharacter}`);
  const villainCard = document.getElementById(`villain-card-${selectedVillain}`);
  const blastSound = document.getElementById("blastSound");

  if (answer.toLowerCase() === expected.toLowerCase()) {
    if (currentQuestionIndex === 1) {
      enemyHp.style.width = "0%";
      feedback.innerHTML = `<span style='color:lightgreen;'>🔥 Victory! Villain ${selectedVillain} defeated!</span>`;
      blastSound.play();
      villainCard.classList.add("blast");

      defeatedVillains.add(selectedVillain);

      // Reset villain after defeat
      selectedVillain = "";

      // Auto-scroll to next section if all villains are defeated
      if (defeatedVillains.size === 4) {
        feedback.innerHTML += `<br>🌟 All villains defeated! Moving to next realm...`;
        setTimeout(() => {
          const nextSection = document.getElementById("nextGameSection");
          if (nextSection) {
            nextSection.scrollIntoView({ behavior: "smooth" });
          }
        }, 1800);
      }
    } else {
      currentQuestionIndex++;
      feedback.innerHTML = `<span style='color:lightgreen;'>✅ Good! Next question...</span>`;
      document.getElementById("battleAnswer").value = "";
      document.getElementById("questionText").textContent = questions[selectedCharacter][currentQuestionIndex].q;
    }
  } else {
    playerCard.classList.add("blast");
    feedback.innerHTML = `<span style='color:red;'>❌ Wrong! ${selectedCharacter} got blasted!</span>`;
    blastSound.play();
  }
}
</script>

<style>

  #learns {
  position: relative;
}


  .dragon-red {
    color: #dc143c; /* Dragon Red */
  }

  .dragon-red:hover {
    text-shadow: 0 0 10px #dc143c, 0 0 20px #dc143c;
  }

 .character-card {
      perspective: 1000px;
      background: transparent;
      border: none;
    }
    .flip-inner {
      position: relative;
      width: 100%;
      height: 300px;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
      border-radius: 15px;
    }
    .character-card:hover .flip-inner {
      transform: rotateY(180deg);
    }
    .flip-front, .flip-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 15px;
      overflow: hidden;
    }
    .flip-front {
      background: #1a1a2e;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .flip-front img {
      max-height: 100%;
      width: auto;
      border-radius: 15px;
    }
    .flip-back {
      background: #111;
      color: white;
      transform: rotateY(180deg);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 15px;
      border: 2px solid crimson;
    }
    .btn-select {
      margin-top: 10px;
      background-color: crimson;
      color: white;
      border: none;
      padding: 5px 15px;
      border-radius: 5px;
    }
    #arena {
      display: none;
      background-color: #1a1a2e;
      border: 2px solid crimson;
      border-radius: 10px;
      padding: 20px;
      margin-top: 30px;
    }
    .hp-bar {
      height: 20px;
      background: green;
      border-radius: 10px;
      transition: width 0.3s;
    }
    .blast {
      animation: blastEffect 0.5s forwards;
    }
    @keyframes blastEffect {
      to {
        opacity: 0;
        transform: scale(0);
      }
    }
  </style> 
  <h2 style="
  text-align: center;
  font-family: 'Cinzel', serif;
  font-size: 2.6rem;
  color: #ff2f2f;
  margin-bottom: 40px;
  text-shadow: 0 0 12px crimson, 0 0 25px #ff0044;
">
  🎮 Arcade of Legends
</h2>

<?php
include('db.php');

// Fetch all non-deleted games
$sql = "SELECT * FROM games WHERE deleted = 0 ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!-- 🎮 Game Showcase Section -->
<div class="game-showcase" style="
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 25px;
  margin: 50px auto;
  max-width: 1100px;
">

<?php if ($result && $result->num_rows > 0): ?>
  <?php while ($row = $result->fetch_assoc()): ?>
    <div class="game-card" style="
      flex: 1 1 calc(45% - 25px); /* 🔥 Slightly smaller */
      max-width: 420px;
      background: linear-gradient(to bottom, #2a002a, #1a001a);
      border: 2px solid #d2042d;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(210, 4, 45, 0.4);
      color: #fff;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    ">
      <div style="padding: 18px;">
        <h3 style="color: #d2042d; font-size: 1.2rem;"><?= htmlspecialchars($row['title']) ?></h3>
        <p style="font-size: 0.9rem; margin-bottom: 16px;">
          <?= htmlspecialchars($row['description']) ?>
        </p>
        <div style="width: 100%; height: 250px; margin-bottom: 10px;">
          <iframe src="<?= htmlspecialchars($row['iframe_url']) ?>" 
                  style="width: 100%; height: 100%;" 
                  frameborder="0" 
                  allow="fullscreen; gamepad *;" 
                  allowfullscreen>
          </iframe>
        </div>
        <a href="play_game.php?id=<?= $row['id'] ?>" 
           style="display: inline-block; margin-top: 8px; padding: 8px 18px; border-radius: 20px;
                  background: linear-gradient(to right, #7a0000, #ff0000); color: white; text-decoration: none;
                  font-weight: bold; font-size: 0.95rem; box-shadow: 0 0 8px crimson;">
          🎮 Play Fullscreen
        </a>
      </div>
    </div>
  <?php endwhile; ?>
<?php else: ?>
  <p style="text-align: center; font-size: 1.2rem; color: #ccc;">No games found!</p>
<?php endif; ?>

</div>

<!-- ✨ Hover Animation CSS -->
<style>
    .game-showcase {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 25px;
      margin: 50px auto;
      max-width: 1100px;
    }

    .game-card {
      flex: 1 1 calc(45% - 25px);
      max-width: 420px;
      background: linear-gradient(to bottom, #2a002a, #1a001a);
      border: 2px solid #d2042d;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(210, 4, 45, 0.4);
      color: #fff;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .game-card:hover {
      transform: scale(1.03);
      box-shadow: 0 0 35px rgba(210, 4, 45, 0.8);
    }

    @media (max-width: 768px) {
      .game-card {
        flex: 1 1 100% !important;
        max-width: 90% !important;
        margin: 0 auto;
      }
    }

    h1 {
      font-size: 2.5rem;
      color: #ffcc70;
      animation: flicker 2s infinite;
    }

    @keyframes flicker {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.7; }
    }

    .quote-box {
      margin: 40px auto;
      padding: 20px;
      background: rgba(255,255,255,0.05);
      border-radius: 15px;
      width: 70%;
      font-size: 1.4rem;
      border-left: 5px solid #ffcc70;
      min-height: 80px;
      transition: 0.4s ease;
    }

    .options {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;
      margin-top: 30px;
    }

    .option-btn {
      background: #1e1e2f;
      padding: 12px 20px;
      border-radius: 10px;
      color: #fff;
      border: 2px solid #ffcc70;
      cursor: pointer;
      transition: 0.3s;
    }

    .option-btn:hover {
      background: #ffcc70;
      color: #000;
    }

    .result {
      margin-top: 30px;
      font-size: 1.2rem;
      min-height: 80px;
    }

    .next-btn {
      margin-top: 20px;
      background: #ffcc70;
      color: #000;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      display: none;
    }

    .shake {
      animation: shake 0.4s;
    }

    @keyframes shake {
      0% { transform: translateX(0); }
      25% { transform: translateX(-10px); }
      50% { transform: translateX(10px); }
      75% { transform: translateX(-10px); }
      100% { transform: translateX(0); }
    }

    .glow {
      animation: glow 1s ease-out;
    }

    @keyframes glow {
      0% { box-shadow: 0 0 10px #00ffcc; }
      100% { box-shadow: 0 0 0px transparent; }
    }

    .music-toggle {
      position: absolute;
      top: 20px;
      right: 30px;
      background: #ffcc70;
      color: #000;
      padding: 6px 12px;
      border-radius: 5px;
      font-size: 0.9rem;
      cursor: pointer;
      border: none;
    }

    .dragon-heading {
      text-align: center;
      color: #ff3e3e;
      font-size: 2.5rem;
      text-shadow: 1px 1px 5px #000000a0;
      font-family: 'Cinzel', serif;
      margin-bottom: 20px;
      animation: glowUp 2s ease-in-out infinite alternate;
    }

    @keyframes glowUp {
      from {
        text-shadow: 0 0 5px #ff3e3e, 0 0 10px #b30000;
      }
      to {
        text-shadow: 0 0 15px #ff6666, 0 0 25px #ff0000;
      }
    }
</style>
  <button class="music-toggle" onclick="toggleMusic()">🎵 Toggle Music</button>
</section>
  <h1 class="dragon-heading">🔮 Echoes of the Realms</h1>
  <div class="quote-box" id="quoteBox">Loading quote...</div>

  <div class="options">
    <button class="option-btn" onclick="checkAnswer('Adalia')">🔥 Adalia Ember</button>
    <button class="option-btn" onclick="checkAnswer('Wyllan')">❄️ Wyllan Glacia</button>
    <button class="option-btn" onclick="checkAnswer('Falencia')">🌿 Falencia Syliva</button>
    <button class="option-btn" onclick="checkAnswer('Vethis')">🌪️ Vethis Zephyrus</button>
    <button class="option-btn" onclick="checkAnswer('Shadow')">🖤 Shadow</button>
  </div>

  <div class="result" id="resultBox"></div>
  <button class="next-btn" id="nextBtn" onclick="loadNextQuote()">Next Quote ➡️</button>

  <!-- 🎧 Sounds -->
  <audio id="correctSound" src="voice/ElevenLabs_2025-06-17T19_10_33_Liam_pre_sp100_s50_sb75_v3.mp3"></audio>
  <audio id="bgMusic" src="voice/Victory(chosic.com).mp3" loop></audio>

  <!-- Shadow voice taunts -->
  <audio id="taunt1" src="voice/ElevenLabs_2025-06-17T19_12_09_Bill_pre_sp100_s50_sb75_v3.mp3"></audio>
  <audio id="taunt2" src="voice/evil-laughing-89786.mp3"></audio>
  <audio id="taunt3" src="voice/ElevenLabs_2025-06-17T19_12_57_Bill_pre_sp100_s50_sb75_v3.mp3"></audio>


  <script>
    const quotes = [
      {
        text: "“The wind does not follow, it leads.”",
        correct: "Vethis",
        lore: "🌪️ Vethis Zephyrus whispered this before vanishing into the clouds."
      },
      {
        text: "“Fire is not fury. It's focus.”",
        correct: "Adalia",
        lore: "🔥 Adalia Ember, while fading a cursed blade, spoke these wise words."
      },
      {
        text: "“The forest never forgets. Neither do I.”",
        correct: "Falencia",
        lore: "🌿 Falencia Syliva guards the ancient groves of Syliva with this vow."
      },
      {
        text: "“Ice doesn’t break. It remembers.”",
        correct: "Wyllan",
        lore: "❄️ Wyllan Glacia carved this into a frozen wall near the Crystal Cliffs."
      },
      {
        text: "“Your truth is just another illusion.”",
        correct: "Shadow",
        lore: "🖤 Shadow taunts the brave with divine lies and beautiful chaos."
      }
    ];

    const shadowLines = [
      "“Even light gets lost in illusions...”",
      "“You fight with truth, I deceive with beauty.”",
      "“You’re not in control here...”",
      "“Do you really know your heroes?”"
    ];

    const shadowVoices = [
      document.getElementById("taunt1"),
      document.getElementById("taunt2"),
      document.getElementById("taunt3")
    ];

    const quoteBox = document.getElementById("quoteBox");
    const resultBox = document.getElementById("resultBox");
    const nextBtn = document.getElementById("nextBtn");
    const correctSound = document.getElementById("correctSound");
    const narratorVoice = document.getElementById("narratorVoice");
    const bgMusic = document.getElementById("bgMusic");

    function toggleMusic() {
      if (bgMusic.paused) {
        bgMusic.play();
      } else {
        bgMusic.pause();
      }
    }

    let currentQuote = {};

    function checkAnswer(selected) {
      if (selected === currentQuote.correct) {
        correctSound.play();
        quoteBox.classList.add("glow");
        resultBox.innerHTML = `<span style="color:#00ffcc">✅ Correct!</span><br>${currentQuote.lore}`;
      } else {
        // Random shadow taunt
        const tauntText = shadowLines[Math.floor(Math.random() * shadowLines.length)];
        const voice = shadowVoices[Math.floor(Math.random() * shadowVoices.length)];
        voice.play();

        quoteBox.classList.add("shake");
        resultBox.innerHTML = `<span style="color:#ff6b6b">❌ Shadow mocks you:</span><br>${tauntText}`;
      }

      nextBtn.style.display = "inline-block";
    }

    loadNextQuote(); // Load first quote

    function loadNextQuote() {
  quoteBox.classList.remove("glow", "shake");
  resultBox.innerHTML = "";
  nextBtn.style.display = "none";

  const randomIndex = Math.floor(Math.random() * quotes.length);
  currentQuote = quotes[randomIndex];
  quoteBox.textContent = currentQuote.text;
}

  </script>
<!-- ⚙️ Script -->

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

