<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background-color: #34495e;  /* Darker blue for navbar */
            padding: 5px 0;  /* Make the navbar thinner */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-nav {
            margin-left: 0;  /* Make navbar items align to the left */
            text-align: left;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-size: 18px;
            padding: 10px 15px;  /* Adjust padding for a better look */
        }

        .navbar-nav .nav-link:hover {
            color: #FF6347;  /* Light red color on hover */
            text-decoration: underline;
        }

        /* Dropdown */
        .dropdown-menu {
            background-color: #34495e; /* Dark background for dropdown */
            border: none;
        }

        .dropdown-item {
            color: #fff;
        }

        .dropdown-item:hover {
            background-color: #2c3e50;
        }

        /* Cards with Light Background */
        .custom-card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .card-body a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .card-body a:hover {
            color: #FF6347;
        }

        .read-more {
            color: #28a745;
            font-weight: bold;
            text-decoration: none;
        }

        .read-more:hover {
            color: #218838;
            text-decoration: underline;
        }

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

        /* Responsive design for mobile and tablet */
        @media (max-width: 767px) {
            .navbar {
                padding: 10px 0;
            }

            .custom-card {
                margin-bottom: 20px;
            }
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" >Global Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-0">  <!-- Changed from ms-auto to ms-0 to align to left -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('main')}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sections
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ( App\Models\Section::all() as $item)
                            <li><a class="dropdown-item" href="{{ route('section.show', $item->id) }}">{{ $item->section }}</a></li>
                        @endforeach    
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#footer">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container my-5">
        <div class="row">
            @foreach ($section->Blog as $blog)
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card custom-card">
                        <img class="card-img-top w-100" src="{{ asset('public/storage/images/' . $blog->image) }}" alt="{{ $blog->blog_title }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->blog_title }}</h4>
                            <h6 class="card-title">Section: {{ $blog->section->section }}</h6>
                            <a class="read-more" href="{{ route('Blog.show', $blog->id) }}">Read more <i class="fe fe-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
