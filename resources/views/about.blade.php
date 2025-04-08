@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container">
    <!-- Dark Mode Toggle Button -->
    <button class="dark-mode-toggle" onclick="toggleDarkMode()">🌙</button>

    <div class="about-card">
        <h1>About Us</h1>
        <p>Welcome to our application! We are dedicated to providing the best products and services to our customers.</p>
        <p>Our mission is to deliver high-quality pro   ducts with exceptional customer service.
            Also, this is where the admin can manage the products effectively.
        </p>
    </div>
</div>

<!-- Dark Mode Styling -->
<style>
    /* Light Mode Styles */
    body {
        background-color: #ffffff;
        color: #000000;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .about-card {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background: #f8f9fa;
        color: #000;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    /* Dark Mode */
    .dark-mode {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    .dark-mode .about-card {
        background: #1e1e1e !important;
        color: #ffffff !important;
        box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
    }

    /* Dark Mode Button */
    .dark-mode-toggle {
        position: absolute;
        top: 20px;
        right: 20px;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
    }

    .dark-mode .dark-mode-toggle {
        color: #ffdd57;
    }
</style>

<!-- Dark Mode Script -->
<script>
    function toggleDarkMode() {
        const body = document.body;
        body.classList.toggle("dark-mode");

        // Save Dark Mode Preference
        const isDarkMode = body.classList.contains("dark-mode");
        localStorage.setItem("darkMode", isDarkMode);
    }

    // Apply Dark Mode on Page Load if Saved
    (function() {
        if (localStorage.getItem("darkMode") === "true") {
            document.body.classList.add("dark-mode");
        }
    })();
</script>

@endsection