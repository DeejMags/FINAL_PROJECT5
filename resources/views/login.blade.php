<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body.light-mode {
            background-color: #f8f9fa;
            color: #000;
        }
        body.dark-mode {
            background-color: #121212;
            color: #fff;
        }
        .card {
            background-color: #fff;
            color: #000;
        }
        body.dark-mode .card {
            background-color: #1e1e1e;
            color: #fff;
        }
        .dark-mode-toggle {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
        }
    </style>
</head>
<body class="light-mode">
    <button class="dark-mode-toggle" onclick="toggleDarkMode()">🌙</button>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4" style="width: 350px;">
            <h3 class="text-center">Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <p class="text-center mt-3">
                    Don't have an account? <a href="{{ route('signup') }}">Sign Up</a>
                </p>
            </form>
        </div>
    </div>
    <script>
        function toggleDarkMode() {
            const body = document.body;
            body.classList.toggle("dark-mode");
            body.classList.toggle("light-mode");
            localStorage.setItem("darkMode", body.classList.contains("dark-mode"));
        }
        
        (function() {
            if (localStorage.getItem("darkMode") === "true") {
                document.body.classList.add("dark-mode");
                document.body.classList.remove("light-mode");
            }
        })();
    </script>
</body>
</html>