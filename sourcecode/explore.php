<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Explore</title>

  <style>
    section {
      background: linear-gradient(to right, #9400d3, #ff0094);
      color: white;
      font-family: 'Segoe UI', sans-serif;
      overflow-x: hidden;
    }

    .song-thumb {
      cursor: pointer;
      transition: transform 0.2s;
    }

    .song-thumb:hover {
      transform: scale(1.05);
    }

    .hide-scrollbar {
      overflow-x: scroll;
      scrollbar-width: none;
    }

    .song-thumb {
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      cursor: pointer;
    }

    .song-thumb:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    audio::-webkit-media-controls-panel {
      background-color: #333;
      border-radius: 12px;
    }


    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f8f8;
      color: #000000;
      font-size: 1.2 rem;
      overflow-x: hidden;
    }

    .navbar {
      background-color: #f8f8f8;
      padding: 20px;
    }

    .nav-link {
      color: #000000;
      font-weight: bold;
    }

    .nav-link:hover {
      color: #9400D3;
    }

    .btn-signup {
      border-radius: 20px;
      padding: 13px;
      background-color: #9400D3;
      color: #f8f8f8;
      font-weight: bold;
    }

    .btn-signup:hover {
      background-color: #c773eb;
      color: #000000;
    }

    .btn-login {
      border-radius: 20px;
      padding: 13px;
      border: 2px solid #000000;
      color: #000000;
      font-weight: bold;
    }

    .btn-login:hover {
      border: 2px solid #9400D3;
      color: #9400D3;
    }

    .btn-start {
      border-radius: 20px;
      padding: 10px;
      background-color: #9400D3;
      color: #f8f8f8;
      font-weight: bold;
    }

    .btn-start:hover {
      background-color: #c773eb;
      color: #000000;
    }

    .btn-signup a {
      text-decoration: none;
      color: #f8f8f8;
    }

    .btn-login a {
      text-decoration: none;
      color: #000000;
    }

    .btn-start a {
      text-decoration: none;
      color: #f8f8f8;
    }

    .hero {
      padding: 4rem 2rem;
      background-image: url('assets/bg1.gif');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 450px;
    }

    .col-md-7 {
      padding: 10px;
    }

    .hero-text h1 {
      color: #f8f8f8;
      font-family: "Anton", sans-serif;
      font-weight: 800;
      font-size: 3.5rem;
      margin-top: 30px;
    }

    .hero-text p {
      color: #f8f8f8;
      margin: 1rem 0;
      font-size: 1.2rem;
    }

    .hero-img+.shape-animate {
      width: 150px;
      height: 150px;
    }

    .about-section {
      padding: 3rem 2rem;
      padding: 30px;
      background-color: #9400D3;
      color: #f8f8f8;
    }

    .about-section h1 {
      font-weight: bold;
      font-size: 3rem;
    }

    .about-section p {
      font-size: 1.1rem;
      margin-bottom: 20px;
    }

    .col-md-8 {
      padding: 10px;
    }

    .community-box {
      background: #f8f8f8;
      color: #000000;
      padding: 2rem;
      border-radius: 1rem;
    }

    .community-box p {
      border-left: #000000 solid 4px;
      padding: 10px;
    }

    .developer-section {
      padding: 3rem 2rem;
      background-color: #f8f8f8;
    }

    .developer-section h1 {
      color: #000000;
      font-weight: bold;
      font-size: 3rem;
      margin-bottom: 30px;
    }

    .developer-section img {
      border-radius: 50%;
      margin-bottom: 20px;
    }

    .contact-icons i {
      font-size: 1.2rem;
      margin-right: 0.5rem;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/Melodify Logo.png" alt="Melodify Logo" width="40">
      </a>
      <!-- Toggler for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Collapsible content -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
        <ul class="navbar-nav me-3">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link" href="explore.php">Explore</a></li>
        </ul>
        <?php if (isset($_SESSION['username'])): ?>
          <button class="btn"><a href="logout.php">Logout</a></button>
        <?php else: ?>
          <button class="btn btn-signup me-3"><a href="signup.html">Sign Up</a></button>
          <button class="btn btn-login"><a href="login.php">Log In</a></button>
        <?php endif; ?>
      </div>
    </div>
  </nav>
  <section class="container-fluid py-3 text-white bg-dark">
    <div class="mb-4">
      <div class="input-group">
        <input type="text" id="deezer-search-input" class="form-control"
          placeholder="Search Deezer for songs, albums, or artists...">
        <button class="btn btn-light" id="deezer-search-btn">Search</button>
      </div>
    </div>

    <div id="deezer-search-results" class="mb-4"></div>

    <h4 class="fw-bold mb-3">New albums and singles</h4>
    <div id="deezer-albums" class="row mb-4 g-2">
      <!-- blah blah blah -->
    </div>

  </section>

  <script>
    const searchInput = document.getElementById('deezer-search-input');
    const searchBtn = document.getElementById('deezer-search-btn');
    const resultsDiv = document.getElementById('deezer-search-results');

    function renderDeezerResults(data) {
      if (!data || !data.data || data.data.length === 0) {
        resultsDiv.innerHTML = '<p class="text-warning">No results found.</p>';
        return;
      }

      let html = '<div class="row g-3">';
      data.data.forEach(item => {
        if (item.type === 'track') {
          html += `
          <div class="col-md-4">
            <div class="card h-100 bg-dark text-white shadow song-thumb">
              <img src="${item.album?.cover_medium || 'fallback.jpg'}" class="card-img-top" alt="${item.title}" style="object-fit: cover; height: 200px;">
              <div class="card-body d-flex flex-column justify-content-between">
                <div>
                  <h5 class="card-title">${item.title}</h5>
                  <p class="card-text mb-1">
                    Artist: <span class="deezer-artist fw-semibold" data-artist-id="${item.artist.id}" style="cursor:pointer; color:#ffb3ec;">${item.artist.name}</span><br>
                    Album: <span class="deezer-album fw-semibold" data-album-id="${item.album.id}" style="cursor:pointer; color:#b3d1ff;">${item.album.title}</span>
                  </p>
                </div>
                <div class="mt-2">
                  ${item.preview ? `<audio controls src="${item.preview}" class="w-100 rounded-pill"></audio>` : '<small>No preview available</small>'}
                </div>
              </div>
            </div>
          </div>`;
        } else if (item.type === 'artist') {
          html += `
          <div class="col-md-3">
            <div class="card bg-secondary text-white h-100">
              <img src="${item.picture_medium}" class="card-img-top" alt="${item.name}">
              <div class="card-body">
                <h5 class="card-title deezer-artist" data-artist-id="${item.id}" style="cursor:pointer;color:#ffb3ec;">${item.name}</h5>
              </div>
            </div>
          </div>`;
        } else if (item.type === 'album') {
          html += `
          <div class="col-md-3">
            <div class="card bg-secondary text-white h-100">
              <img src="${item.cover_medium}" class="card-img-top" alt="${item.title}">
              <div class="card-body">
                <h5 class="card-title deezer-album" data-album-id="${item.id}" style="cursor:pointer;color:#b3d1ff;">${item.title}</h5>
                <p class="card-text">Artist: ${item.artist.name}</p>
              </div>
            </div>
          </div>`;
        }
      });
      html += '</div>';
      resultsDiv.innerHTML = html;
    }

    searchBtn.addEventListener('click', function() {
      const query = searchInput.value.trim();
      if (!query) return;

      resultsDiv.innerHTML = '<p>Loading...</p>';

      const script = document.createElement('script');
      const callbackName = `jsonp_callback_${Date.now()}`;
      window[callbackName] = function(data) {
        renderDeezerResults(data);
        delete window[callbackName];
        document.body.removeChild(script);
      };

      script.src = `https://api.deezer.com/search?q=${encodeURIComponent(query)}&output=jsonp&callback=${callbackName}`;
      document.body.appendChild(script);
    });

    searchInput.addEventListener('keydown', function(e) {
      if (e.key === 'Enter') searchBtn.click();
    });

    fetch('deezer-proxy.php?endpoint=chart/0/albums')
      .then(response => response.json())
      .then(data => {
        const albums = data.data || [];
        const container = document.getElementById('deezer-albums');
        if (!container) return;

        let html = '';
        albums.slice(0, 8).forEach(album => {
          html += `
          <div class="col-6 col-md-3 col-lg-2">
            <div class="card bg-dark text-white h-100">
              <img src="${album.cover_medium}" alt="${album.title}" class="card-img-top">
              <div class="card-body p-2">
                <p class="mb-1 fw-semibold">${album.title}</p>
                <small>${album.artist.name}</small>
              </div>
            </div>
          </div>`;
        });
        container.innerHTML = html;
      })
      .catch(() => {
        document.getElementById('deezer-albums').innerHTML = '<p class="text-danger">Failed to load albums from Deezer.</p>';
      });
  </script>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>