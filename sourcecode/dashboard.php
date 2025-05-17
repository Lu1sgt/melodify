<?php
include 'auth-check.php'; 

$conn = new mysqli('localhost', 'root', '', 'melodify');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$userId = $_SESSION['user_id'];

$stmt = $conn->prepare('SELECT * FROM playlists WHERE user_id = ?');
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

$playlists = [];
while ($row = $result->fetch_assoc()) {
    $playlists[] = $row;
    $row['']
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h4 class="fw-bold">Your Playlists</h4>
        <div class="d-flex gap-4">
            <?php foreach ($playlists as $playlist): ?>
                <div style="width: 180px;">
                    <img src="assets/<?php echo htmlspecialchars($playlist['image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($playlist['name']); ?>">
                    <p class="mb-0 fw-bold"><?php echo htmlspecialchars($playlist['name']); ?></p>
                    <small><?php echo htmlspecialchars($playlist['description']); ?></small>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #9400d3, #ff0094);
      color: white;
      font-family: 'Segoe UI', sans-serif;
      overflow-x: hidden;
    }
    body::-webkit-scrollbar {
      display: none;
    }
    .hide-scrollbar {
    overflow-x: scroll;
    scrollbar-width: none; 
    }
    .hide-scrollbar::-webkit-scrollbar {
    display: none; 
    }
    .container {
      padding: 10px;
      margin-bottom: 30px;
    }
  </style>
</head>
<body class="bg-gradient" style="background: linear-gradient(to right, #e83e8c, #6f42c1); color: white;">
  <div class="container py-4">
    <h4 class="fw-bold">Recently Played</h4>
    <div class="d-flex hide-scrollbar gap-4 pb-2">
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/burnout.jpg" class="img-fluid" alt="Burnout">
        <p class="mb-0 fw-bold">Burnout</p>
        <small>Song | Sugarfree</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/sameground.jpg" class="img-fluid" alt="Same Ground">
        <p class="mb-0 fw-bold">Same Ground</p>
        <small>Song | Kitchie Nadal</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/sameground.jpg" class="img-fluid" alt="Same Ground">
        <p class="mb-0 fw-bold">Same Ground</p>
        <small>Song | Kitchie Nadal</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/sameground.jpg" class="img-fluid" alt="Same Ground">
        <p class="mb-0 fw-bold">Same Ground</p>
        <small>Song | Kitchie Nadal</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/sameground.jpg" class="img-fluid" alt="Same Ground">
        <p class="mb-0 fw-bold">Same Ground</p>
        <small>Song | Kitchie Nadal</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/sameground.jpg" class="img-fluid" alt="Same Ground">
        <p class="mb-0 fw-bold">Same Ground</p>
        <small>Song | Kitchie Nadal</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/sameground.jpg" class="img-fluid" alt="Same Ground">
        <p class="mb-0 fw-bold">Same Ground</p>
        <small>Song | Kitchie Nadal</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/sameground.jpg" class="img-fluid" alt="Same Ground">
        <p class="mb-0 fw-bold">Same Ground</p>
        <small>Song | Kitchie Nadal</small>
      </div>

    </div>
    <h4 class="mt-4 fw-bold">Albums</h4>
    <div class="d-flex hide-scrollbar gap-4 pb-2">
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid" alt="Silakbo">
        <p class="mb-0 fw-bold">Silakbo</p>
        <small>Album | Cup of Joe</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid" alt="Silakbo">
        <p class="mb-0 fw-bold">Silakbo</p>
        <small>Album | Cup of Joe</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid" alt="Silakbo">
        <p class="mb-0 fw-bold">Silakbo</p>
        <small>Album | Cup of Joe</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid" alt="Silakbo">
        <p class="mb-0 fw-bold">Silakbo</p>
        <small>Album | Cup of Joe</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid" alt="Silakbo">
        <p class="mb-0 fw-bold">Silakbo</p>
        <small>Album | Cup of Joe</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid" alt="Silakbo">
        <p class="mb-0 fw-bold">Silakbo</p>
        <small>Album | Cup of Joe</small>
      </div>
      <div class="flex-shrink-0" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid" alt="Silakbo">
        <p class="mb-0 fw-bold">Silakbo</p>
        <small>Album | Cup of Joe</small>
      </div>
    </div>
    <h4 class="mt-4 fw-bold">Artists</h4>
    <div class="d-flex hide-scrollbar gap-4 pb-2">
      <div class="flex-shrink-0 text-center bold" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid rounded-circle" alt="Cup of Joe">
        <p class="mb-0 fw-bold">Cup of Joe</p>
      </div>
      <div class="flex-shrink-0 text-center bold" style="width: 180px;">
        <img src="assets/sza.jpg" class="img-fluid rounded-circle" alt="Sza">
        <p class="mb-0 fw-bold">Sza</p>
      </div>
      <div class="flex-shrink-0 text-center bold" style="width: 180px;">
        <img src="assets/niki.jpg" class="img-fluid rounded-circle alt="Niki">
        <p class="mb-0 fw-bold">Niki</p>
      </div>
      <div class="flex-shrink-0 text-center bold" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid rounded-circle" alt="Silakbo">
        <p class="mb-0 fw-bold">Artist Name</p>
      </div>
      <div class="flex-shrink-0 text-center bold" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid rounded-circle" alt="Silakbo">
        <p class="mb-0 fw-bold">Artist Name</p>
      </div>
      <div class="flex-shrink-0 text-center bold" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid rounded-circle" alt="Silakbo">
        <p class="mb-0 fw-bold">Artist Name</p>
      </div>
      <div class="flex-shrink-0 text-center bold" style="width: 180px;">
        <img src="assets/multo.jpg" class="img-fluid rounded-circle" alt="Silakbo">
        <p class="mb-0 fw-bold">Artist Name</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>