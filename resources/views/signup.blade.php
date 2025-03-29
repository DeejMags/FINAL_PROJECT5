<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Default Light Mode */
        body.light-mode {
            background-color: #f8f9fa;
            color: #000;
        }

        /* Dark Mode */
        body.dark-mode {
            background-color: #121212;
            color: #fff;
        }

        /* Card Styling */
        .card {
            background-color: white;
            color: black;
        }
        .dark-mode .card {
            background-color: #333;
            color: white;
        }

        /* Dark Mode Button */
        .dark-mode-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body class="light-mode">
    <button class="dark-mode-toggle" onclick="toggleDarkMode()">🌙</button>
    
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4" style="width: 350px;">
            <h3 class="text-center">Sign Up</h3>
            <form method="POST" action="{{ route('signup') }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block ">Sign Up</button>
                <p class="text-center mt-3">
                    Already have an account? <a href="{{ route('login') }}">Login</a>
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