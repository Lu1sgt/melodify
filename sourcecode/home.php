<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Melodify - Your sound, your world!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #9400d3, #ff0094);
      color: white;
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar {
      height: 100vh;
      width:240px;
      padding: 1rem;
      background-color: #d9d9d9;
      color: black;
      position: fixed;
    }
    .sidebar .nav-link {
      color: black;
    }
    .sidebar .nav-link.active {
      background-color: #909090;
      color: white;
      border-radius: 10px;
    }
    .sidebar .logo img {
      width: 50px;
      height: auto;
    }
    .rounded-circle {
      width: 40px;
      height: 40px;
    }
    .iframe-container {
      height: 100vh;
      overflow: hidden;
    }
    iframe {
      border: none;
      width: 100%;
      height: 100%;
    }
    .mood-filter span {
      cursor: pointer;
      margin-right: 15px;
    }
    .song-thumb {
      cursor: pointer;
      transition: transform 0.2s;
    }
    .song-thumb:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-2 d-none d-md-block sidebar p-3">
      <div class="logo d-flex align-items-center mb-4">
        <img src="assets/Melodify Logo.png" alt="Melodify" class="img-fluid" style="width: 40px; height: 40px;">
        <h3 class="ms-2 mb-0">Melodify</h3>
      </div>
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link active" href="#" onclick="navigateTo('dashboard.html', this)">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="navigateTo('explore.html', this)">Explore</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="navigateTo('library.html', this)">Library</a></li>
      </ul>
      
    </nav>
    

    <!-- Main content -->
    <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between align-items-center py-3">
        <div class="input-group w-50">
          <input type="text" class="form-control" placeholder="Search music, artist, album, playlist">
          <button class="btn btn-dark"><i class="bi bi-search"></i></button>
        </div>
        <div>
          <a href="profile.html"><img src="assets/niki.jpg" class="rounded-circle" alt="Profile"></a>
        </div>
      </div>

      <!-- Mood Filters -->
      <div class="mood-filter mb-3">
        <span>Energize</span>
        <span>Relax</span>
        <span>Feel Good</span>
        <span>Commute</span>
        <span>Relapse</span>
      </div>

      <!-- Iframe to hold dynamic content -->
      <div class="iframe-container">
        <iframe id="musicFrame" src="dashboard.html"></iframe>
      </div>
    </main>
  </div>
</div>

<!-- Clickable JS simulation -->
<script>
  function playSong(song) {
    const frame = document.getElementById('musicFrame');
    frame.src = song + '.html';
  }
</script>

<!-- Example song triggers -->
<div style="display:none">
  <img class="song-thumb" src="https://via.placeholder.com/150" alt="Burnout" onclick="playSong('burnout')">
  <img class="song-thumb" src="https://via.placeholder.com/150" alt="Same Ground" onclick="playSong('same-ground')">
  <img class="song-thumb" src="https://via.placeholder.com/150" alt="Silakbo" onclick="playSong('silakbo')">
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function navigateTo(page, el) {
    document.getElementById('musicFrame').src = page;

    // Active state toggle
    const links = document.querySelectorAll('.sidebar .nav-link');
    links.forEach(link => link.classList.remove('active'));
    el.classList.add('active');
  }
</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
