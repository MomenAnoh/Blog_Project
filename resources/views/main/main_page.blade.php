<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A beautiful blog sharing the latest articles">
    <meta name="keywords" content="Blog, Articles, News">
    <meta name="author" content="Your Blog Name">
    <title>My Blog - Home</title>

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* Header (Navbar) */
        header {
            background-color: #2c3e50;
            /* Dark Blue */
            padding: 10px 0;
            color: #fff;
        }

        header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header .logo img {
            max-width: 150px;
        }

        header .nav {
            display: flex;
            align-items: center;
        }

        header .nav li {
            list-style: none;
            margin: 0 15px;
            position: relative;
            /* Added to enable dropdown */
        }

        header .nav a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        header .nav a:hover {
            color: #ecf0f1;
            /* Light Gray */
        }

        /* Dropdown Styles */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #2c3e50;
            min-width: 160px;
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #34495e;
        }

        /* Display Dropdown when Active */
        .dropdown.active .dropdown-content {
            display: block;
        }

        /* Login Buttons */
        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .login-btn {
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            border: 2px solid #fff;
            padding: 5px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .login-btn:hover {
            background-color: #3498db;
            /* Light Blue */
            color: #fff;
        }

        /* Hero Section */
        .hero-section {
            background: url('img/hero-bg.jpg') no-repeat center center;
            background-size: cover;
            padding: 100px 0;
            text-align: center;
            color: #fff;
        }

        .hero-section h1,
        .hero-section p {
            color: #2c3e50;
        }

        .hero-section h1 {
            font-size: 60px;
            margin: 0;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .hero-section p {
            font-size: 22px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
            padding: 12px 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        /* New Image Section Below Hero */
        .image-section {
            background-image: url('assets/img/OIF.jpeg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
        }

        /* Blog Posts Section */
        .blog-posts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            padding: 50px 15px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .blog-post {
            background: #fff;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .blog-post img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .blog-post h3 {
            font-size: 24px;
            margin: 15px 0;
        }

        .blog-post p {
            font-size: 16px;
            color: #555;
        }

        .blog-post .read-more {
            display: inline-block;
            background-color: #3498db;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .blog-post .read-more:hover {
            background-color: #2980b9;
        }

        /* Footer Section */
        footer {
            background-color: #34495e;
            color: #fff;
            padding: 30px 0;
            text-align: center;
        }

        footer .social-links a {
            color: #ecf0f1;
            text-decoration: none;
            margin: 0 15px;
            font-size: 24px;
        }

        footer .social-links a:hover {
            color: #3498db;
        }

        footer p {
            margin: 10px 0;
            font-size: 14px;
        }

        footer a {
            color: #ecf0f1;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <header>
        <div class="container">
            <ul class="nav">
                <!-- Icon added here -->
                <li><a href="#" class="icon"><i class="fa-regular fa-webhook" style="color: #FFD43B; font-size: 24px;"></i></a></li>

                <li><a class="navbar-brand">GLOBAL BLOG</a></li>

                <li><a href="{{ route('main') }}">Home</a></li>

                <!-- Dropdown Menu for Sections -->
                <li class="dropdown" id="sectionsDropdown">
                    <a href="javascript:void(0)" onclick="toggleDropdown()">Sections</a>
                    <div class="dropdown-content">
                        @foreach (App\Models\Section::all() as $item)
                            <a class="dropdown-item" name="section_id" href="{{ route('section.show', $item->id) }}">{{ $item->section }}</a>
                        @endforeach
                    </div>
                </li>

                <li><a href="#footer">Contact</a></li>
            </ul>

            <!-- Add a wrapper for the buttons -->
            <div class="auth-buttons">
                @if (Auth::check())
                    <!-- Display logout if the user is logged in -->
                    <a href="{{ url('/' . ($page = 'auth.register')) }}" class="login-btn">Logout</a>
                @else
                    <!-- Display sign-in if the user is not logged in -->
                    <a href="{{ url('/' . ($page = 'auth.register')) }}" class="login-btn">Sign in</a>
                @endif
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1>Welcome to My Blog</h1>
            <p>Enjoy reading the latest articles and insights on various topics</p>
        </div>
    </div>

    <!-- New Image Section Below Hero -->
    <div class="image-section">
        <!-- Image section content -->
    </div>

    <div class="blog-posts">
        @foreach (App\Models\Blog::all() as $item)
            <div class="blog-post">
                <img src="img/post1.jpg" alt="Post 1">
                <h3>{{ $item->blog_title }}</h3>
                <a href="{{ route('Blog.show', $item->id) }}" class="read-more">Read More</a>
            </div>
        @endforeach
    </div>

    <!-- Footer Section -->
    <footer id="footer">
        <div class="social-links">
            <a href="https://facebook.com" target="_blank">Facebook</a>
            <a href="https://wa.me/yournumber" target="_blank">WhatsApp</a>
            <a href="https://github.com" target="_blank">GitHub</a>
            <a href="https://linkedin.com" target="_blank">LinkedIn</a>
        </div>
        <p>&copy; 2024 My Blog. All Rights Reserved.</p>
        <p><a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a></p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for Dropdown Toggle -->
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('sectionsDropdown');
            dropdown.classList.toggle('active');
        }
    </script>
</body>

</html>
