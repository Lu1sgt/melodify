<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melodify - Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #9400D3, #FF007F);
            color: white;
            overflow-x: hidden;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: #1C1C1C;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .logo-img {
            width: 75px;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-control {
            background: transparent;
            color: #f8f8f8;
        }
        .form-control::placeholder {
            color: rgba(252, 252, 252, 0.7);
        }
        .btn-primary {
            background: #9400D3;
            color:#f8f8f8;
            border: none;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background: #c773eb;
        }
        a {
            color: #9400D3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container text-center">
            <img src="assets/Melodify Logo.png" alt="Melodify" class="logo-img mb-3">
            <h2>Log in to Melodify</h2>
            <form method="post" action="login-process.php">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email or username" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password123" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Log In</button>
            </form>
            <p class="mt-3">Don't have an account? <a href="signup.html">Sign Up</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
